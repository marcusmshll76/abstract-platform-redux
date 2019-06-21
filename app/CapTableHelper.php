<?php
use Illuminate\Support\Facades\DB;

class CapTableHelper {
    public static function process_cap_table( $property_id, $cap_table ) {
        // @TODO support modificaion of an existing cap table
        
        foreach( $cap_table as $investor ) {
            // Determine if the investor is already a user on our platform.
            $maybe_user = DB::table( 'users' )->select( 'id' )->where( 'email', $investor['email'] )->first();
            
            if( !$maybe_user ) {
                // Create the user and invite them.
                DB::table( 'users' )->insert( [
                    'email'         => $investor['email'],
                    'site_id'       => 2, // @TODO make dynamic
                    'invite_code'   => self::generate_invite_code( 8 ),
                    'profile_image' => 'img/default-profile.img',
                    'type'          => 'investor'
                ] );

                // @TODO send welcome email

                $maybe_user = DB::table( 'users' )->select( 'id' )->where( 'email', $investor['email'] )->first();
            }

            // Associate the user with the property.
            DB::table( 'investments' )->insert( [
                'userid'            => $maybe_user->id,
                'propertyid'        => $property_id,
                'investment_amount' => $investor['capital'],
                'contributed'       => $investor['date'],
                'entity_name'       => $investor['entity_name'],
                'share'             => $investor['stake']
            ] );
        }

        return true;
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