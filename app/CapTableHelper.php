<?php
use Illuminate\Support\Facades\DB;

class CapTableHelper {
    public static function process_cap_table( $property_id, $cap_table ) {
        // @TODO support modificaion of an existing cap table
        
        foreach( $cap_table as $investor ) {
            // Determine if the investor is already a user on our platform.
            $maybe_user = DB::table( 'users' )->where( 'email', $investor['email'] )->first();
            $new_user = false;

            if( !$maybe_user ) {
                // Create the user and invite them.
                DB::table( 'users' )->insert( [
                    'email'         => $investor['email'],
                    'site_id'       => 2, // @TODO make dynamic
                    'invite_code'   => self::generate_invite_code( 8 ),
                    'profile_image' => 'img/default-profile.img',
                    'type'          => 'investor'
                ] );

                $maybe_user = DB::table( 'users' )->where( 'email', $investor['email'] )->first();
                $new_user = true;
            }

            // Associate the user with the property.
            DB::table( 'investments' )->insert( [
                'userid'            => $maybe_user->id,
                'propertyid'        => $property_id,
                'investment_amount' => $investor['capital'],
                'contributed'       => $investor['date'],
                'entity_name'       => $investor['entity_name'],
                'share'             => $investor['stake'],
                'type'              => 'sproperty', // @TODO make dynamic
            ] );

            $site = DB::table( 'sites' )->where( 'id', 2 )->first();
            $invite_link = 'http://' . $site->host . '/invite/' . $maybe_user->invite_code;
            $property = DB::table( 'property' )->where( 'id', $property_id )->first();
            $subject = $property->opportunity_name . ' Is Now Serviced By Abstract Tokenization';

            // Send the investor an email
            if( $new_user ) {
                $message = <<<EOD
{$property->opportunity_name}, a portfolio property owned by {$investor['entity_name']} is now serviced by the Abstract Tokenization platform! With Abstract, you can efficiently view reports, download tax forms, and more.

To get started, create your account by clicking this link:
$invite_link

-The Abstract Tokenization Team
EOD;
            } else {
                $invite_link = 'http://' . $site->host . '/login';
                $message = <<<EOD
{$property->opportunity_name}, a portfolio property owned by {$investor['entity_name']} is now serviced by the Abstract Tokenization platform!

Login to your account to view your reports:
$invite_link

-The Abstract Tokenization Team
EOD;
            }

            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom( 'no-reply@abstracttokenization.com', 'Abstract Tokenization' );
            $email->setSubject( $subject );
            $email->addTo( $investor['email'] );
            $email->addContent( 'text/plain', $message );
            $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
            $sendgrid->send( $email );
        }

        return true;
    }

    public static function get_cap_table( $property_id ) {
        $cap = DB::table('investments')
            ->where('investments.propertyid', $property_id )
            ->join('users', 'investments.userid', '=', 'users.id')
            ->get();
        
        $cap_table = [];

        foreach( $cap as $investor ) {
            $cap_table[] = [
                    'Investor Name'        => $investor->entity_name,
                    'Investor Entity'      => '',
                    'Contribution Date'    => $investor->contributed,
                    'Contributed Capital'  => '$' . number_format($investor->investment_amount),
                    'Equity Stake'         => $investor->share * 100 . '%'
            ];
        }

        return $cap_table;
    }

    private static function generate_invite_code( $length = 10 ) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}