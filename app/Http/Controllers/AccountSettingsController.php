<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller {
    public function verification() {
        $form = new \FormBuilder( 'Account Verification' );

        // Step 1. Sponsor Info
        $form->add_step( 'sponsor-info', 'Sponsor Info', 'In order to create digital securities for our Institutional Grade real estate marketplace, please provide the following diligence, you can save and come back at any time. We’ll make it quick!  #timeismoney' );
        
        $form->add_field( 'sponsor-info-left-pane', 'pane', [ 'size' => 'col-md-3'], 'sponsor-info' );
        $form->add_field( 'upload', 'upload', [ 'text' => 'Upload Company Logo' ], 'sponsor-info-left-pane' );
        $form->add_field( 'company_name', 'text', [ 'label' => 'Company Name' ], 'sponsor-info-left-pane' );
        $form->add_field( 'company_webiste', 'text', [ 'label' => 'Company Website' ], 'sponsor-info-left-pane' );

        $form->add_field( 'sponsor-info-right-pane', 'pane', [ 'size' => 'col-md-9' ], 'sponsor-info' );
        $form->add_field( 'sponsor-info-row-1', 'row', [], 'sponsor-info-right-pane' );
        $form->add_field( 'first_name', 'text', [ 'label' => 'First Name', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-1' );
        $form->add_field( 'last_name', 'text', [ 'label' => 'Last Name', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-1' );
        $form->add_field( 'email', 'email', [ 'label' => 'Email', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-1' );
        
        $form->add_field( 'sponsor-info-row-2', 'row', [], 'sponsor-info-right-pane' );
        $form->add_field( 'work_phone', 'text', [ 'label' => 'Work Phone', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-2' );
        $form->add_field( 'mobile_phone', 'text', [ 'label' => 'Mobile Phone', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-2' );
        $form->add_field( 'job_title', 'text', [ 'label' => 'Job Title', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-2' );

        $form->add_field( 'sponsor-info-row-3', 'row', [], 'sponsor-info-right-pane' );
        $form->add_field( 'company_address', 'text', [ 'label' => 'Company Address', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-3' );
        $form->add_field( 'company_city', 'text', [ 'label' => 'Company City', 'colWidth' => 'col-md-2' ], 'sponsor-info-row-3' );
        $form->add_field( 'company_state', 'text', [ 'label' => 'Company State', 'colWidth' => 'col-md-1' ], 'sponsor-info-row-3' );
        $form->add_field( 'sponsor_tin', 'text', [ 'label' => 'Sponsor TIN/EIN', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-3' );

        $form->add_field( 'sponsor-info-row-4', 'row', [], 'sponsor-info-right-pane' );
        $form->add_field( 'company_address_2', 'text', [ 'label' => 'Company Address', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-4' );
        $form->add_field( 'zip', 'text', [ 'label' => 'Post Code', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-4' );
        $form->add_field( 'country', 'text', [ 'label' => 'Country', 'colWidth' => 'col-md-3' ], 'sponsor-info-row-4' );

        // Step 2. About The Sponsor
        $form->add_step( 'about-sponsor', 'About The Sponsor', 'Connect your Sponsor Bio now and this information can automaically be connected to the digital securities you create for Abstract’s Marketplace. Investors will look at your Sponsor Bio to  learn more about  your company’s history.' );
        $form->add_field( 'about-pane', 'pane', [ 'size' => 'col-md-12' ], 'about-sponsor' );
        $form->add_field( 'about-heading', 'heading', [ 'body' => 'Sponsor Bio' ], 'about-pane' );
        $form->add_field( 'about-para', 'paragraph', [ 'body' => 'Reassure potential investors with an in-depth bio describing your past successes, milestones and relavent statistics.'], 'about-pane' );
        $form->add_field( 'sponsor-bio', 'textarea', [], 'about-pane' );
        $form->add_field( 'portfolio_activity_amount', 'text', [ 'label' => 'Total Portfolio Activity Amount' ], 'about-pane' );
        $form->add_field( 'assets_under_management', 'text', [ 'label' => 'Total Assets Under Management'], 'about-pane' );
        $form->add_field( 'total_square_feet', 'text', [ 'label' => 'Total Square Feet Managed' ], 'about-pane' );

        // Step 3. Meet The Principles
        $form->add_step( 'meet', 'Meet The Principles, Property Owners, or Fund Managers', 'Connect any Principles or Partners to your organization.  These will be shared to investors interested in your deals on Abstract’s Marketplace.');
        $form->add_field( 'meet-pane', 'pane', [ 'size' => 'col-md-12' ], 'meet' );
        $form->add_field( 'meet-princ', 'meet-the-principles', [], 'meet-pane' );

        // Step 4. Professional References
        $form->add_step( 'references', 'Professional References', 'Connect any Principles or Partners to your organization.  These will be shared to investors interested in your deals on Abstract’s Marketplace.' );

        // We need 4 identical columns, so let's dynamically generate them.
        for( $i = 0; $i < 4; $i++ ) {
            $pane_key = 'ref-' . $i;
            $form->add_field( $pane_key, 'pane', [ 'size' => 'col-md-3'], 'references' );
            $form->add_field( 'reference_type_' . $i, 'text', [ 'label' => 'Reference Type', 'colWidth' => 'col-md-12' ], $pane_key );
            $form->add_field( 'reference_name' . $i, 'text', [ 'label' => 'First & Last Name', 'colWidth' => 'col-md-12' ], $pane_key );
            $form->add_field( 'reference_phone_' . $i, 'text', [ 'label' => 'Phone Number', 'colWidth' => 'col-md-12' ], $pane_key );
            $form->add_field( 'reference_email_' . $i, 'text', [ 'label' => 'Email Address', 'colWidth' => 'col-md-12' ], $pane_key );
        }
        
        // Step 5. Due Diligence
        $form->add_step( 'diligence', 'Sponsor Diligence With Ease', 'Abstract ensures that our marketplace consists only of institutional grade, high quality properties, funds and Sponsors.  Providing the following diligence will help us quickly qualify you. We’re powered by Box.com to ensure top level security and a succinct diligence hand off between our team and yours.  Simply drag and drop the speciific DD files into their individual folders below.' );
        $form->add_field( 'diligence-pane', 'pane', [ 'size' => 'col-md-12' ], 'diligence' );
        $form->add_field( 'diligence-files', 'fileupload', [], 'diligence' ); // @todo add file list

        return view( 'form-builder', [ 'title' => 'Account Settings -> Account Verification', 'nav' => $this->get_nav('/account-settings/verification'), 'category' => 'account-settings', 'form' => $form->generate() ] );
    }

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }

    private function get_nav( $current ) {
        $nav = array(
            'header'    => 'Account Settings',
            'links'     => array(
                array(
                    'href'  => '/account-settings/verification',
                    'text'  => 'Account Verification',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Digital Custodial Wallet',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Privacy & Data Storage Security',
                    'current' => false,
                ),
                array(
                    'href'  => '#',
                    'text'  => 'Password & Two-Factor Security',
                    'current' => false,
                )
            )
        );

        foreach($nav['links'] as &$l) {
            if( $l['href'] == $current ) {
                $l['current'] = true;
            }
        }

        return $nav;
    }
}