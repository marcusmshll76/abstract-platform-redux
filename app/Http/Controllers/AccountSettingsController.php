<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller {
    public function verification() {
        $form_details = array(
            'header'    => 'Account Verificiation',
            'steps'     => array(
                array(
                    'header'    => 'Sponsor Info',
                    'desc'      => 'In order to create digital securities for our Institutional Grade real estate marketplace, please provide the following diligence, you can save and come back at any time. We’ll make it quick!  #timeismoney',
                    'body'      =>
                        array(
                            array(
                                'type'      => 'pane',
                                'size'      => 'col-md-3',
                                'fields'    => array(
                                    array(
                                        'type'  => 'upload',
                                        'text'  => 'Upload Company Logo',
                                        'name'  => 'logo'
                                    ),
                                    array(
                                        'type'      => 'text',
                                        'label'     => 'Company Name',
                                        'name'      => 'company_name'
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'label' => 'Company Website',
                                        'name'  => 'company_website'
                                    )
                                ),
                            ),
                            array(
                                'type'      => 'pane',
                                'size'      => 'col-md-9',
                                'fields'    => array(
                                    array(
                                        'type'      => 'row',
                                        'fields'  => array(
                                            array(
                                                'type'  => 'text',
                                                'label' => 'First Name',
                                                'name'  => 'first_name',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Last Name',
                                                'name'  => 'last_name',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'email',
                                                'label' => 'Email',
                                                'name'  => 'email',
                                                'colWidth' => 'col-md-3',
                                            )
                                        )
                                    ),
                                    array(
                                        'type'      => 'row',
                                        'fields'  => array(
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Work Phone',
                                                'name'  => 'work_phone',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Mobile Phone',
                                                'name'  => 'mobile_phone',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Job Title',
                                                'name'  => 'job_title',
                                                'colWidth' => 'col-md-3',
                                            )
                                        )
                                    ),
                                    array(
                                        'type'      => 'row',
                                        'fields'  => array(
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Company Address',
                                                'name'  => 'company_address',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'City',
                                                'name'  => 'company_city',
                                                'colWidth' => 'col-md-2',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'State',
                                                'name'  => 'company_state',
                                                'colWidth' => 'col-md-1',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Sponsor TIN/EIN',
                                                'name'  => 'sponsor_tin',
                                                'colWidth' => 'col-md-3',
                                            )
                                        )
                                    ),
                                    array(
                                        'type'      => 'row',
                                        'fields'  => array(
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Company Address',
                                                'name'  => 'company_address_2',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Post Code',
                                                'name'  => 'zip',
                                                'colWidth' => 'col-md-3',
                                            ),
                                            array(
                                                'type'  => 'text',
                                                'label' => 'Country',
                                                'name'  => 'country',
                                                'colWidth' => 'col-md-3',
                                            )
                                        )
                                    )
                                )
                            )
                        )
                ),
                array(
                    'header'    => 'About The Sponsor',
                    'desc'      => 'Connect your Sponsor Bio now and this information can automaically be connected to the digital securities you create for Abstract’s Marketplace. Investors will look at your Sponsor Bio to  learn more about  your company’s history.',
                    'body'      =>
                        array(
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-12',
                                'fields'    => array(
                                    array(
                                        'type'  => 'heading',
                                        'body'  => 'Sponsor Bio'
                                    ),
                                    array(
                                        'type'  => 'paragraph',
                                        'body'  => 'Reassure potential investors with an in-depth bio describing your past successes, milestones and relavent statistics.',
                                    ),
                                    array(
                                        'type'  => 'textarea',
                                        'name'  => 'sponsor_bio'
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'label' => 'Total Portfolio Activity Amount',
                                        'name'  => 'portfolio_activity_amount',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'label' => 'Total Assets Under Management',
                                        'name'  => 'assets_under_management'
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'label' => 'Total Square Feet Managed',
                                        'name'  => 'total_square_feet'
                                    )
                                )
                            )
                        )
                ),
                array(
                    'header'    => 'Meet the Principles, Property Owners or Fund Managers',
                    'desc'      => 'Connect any Principles or Partners to your organization.  These will be shared to investors interested in your deals on Abstract’s Marketplace.',
                    'body'      =>
                        array(
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-12',
                                'fields'    => array(
                                    array(
                                        'type'  => 'meet-the-principles'
                                    )
                                )
                            )
                        )
                ),
                array(
                    'header'    => 'Professional References',
                    'desc'      => 'We will need 4 references from your team.  (1) Commercial Mortgage Broker, (2) Bank References, and (1) CRE Broker.',
                    'body'      => 
                        array(
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-3',
                                'fields' => array(
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_type_1',
                                        'label' => 'Reference Type',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_name_1',
                                        'label' => 'First & Last Name',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_phone_1',
                                        'label' => 'Phone Number',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'email',
                                        'name'  => 'reference_email_1',
                                        'label' => 'Email Address',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                ),
                            ),
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-3',
                                'fields' => array(
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_type_2',
                                        'label' => 'Reference Type',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_name_2',
                                        'label' => 'First & Last Name',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_phone_2',
                                        'label' => 'Phone Number',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'email',
                                        'name'  => 'reference_email_2',
                                        'label' => 'Email Address',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                ),
                            ),
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-3',
                                'fields' => array(
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_type_3',
                                        'label' => 'Reference Type',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_name_3',
                                        'label' => 'First & Last Name',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_phone_3',
                                        'label' => 'Phone Number',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'email',
                                        'name'  => 'reference_email_3',
                                        'label' => 'Email Address',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                ),
                            ),
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-3',
                                'fields' => array(
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_type_4',
                                        'label' => 'Reference Type',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_name_4',
                                        'label' => 'First & Last Name',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'text',
                                        'name'  => 'reference_phone_4',
                                        'label' => 'Phone Number',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                    array(
                                        'type'  => 'email',
                                        'name'  => 'reference_email_4',
                                        'label' => 'Email Address',
                                        'colWidth'  => 'col-md-12',
                                    ),
                                ),
                            ),
                        ),
                ),
                array(
                    'header'    => 'Sponsor Diligence with Ease.',
                    'desc'      => 'Abstract ensures that our marketplace consists only of institutional grade, high quality properties, funds and Sponsors.  Providing the following diligence will help us quickly qualify you. We’re powered by Box.com to ensure top level security and a succinct diligence hand off between our team and yours.  Simply drag and drop the speciific DD files into their individual folders below.',
                    'body'      =>
                        array(
                            array(
                                'type'  => 'pane',
                                'size'  => 'col-md-12',
                                'fields'    => array(
                                    array(
                                        'type'  => 'fileupload'
                                    )
                                )
                            )
                        )
                )
            )
        );

        return view( 'account-settings.verification', [ 'nav' => $this->get_nav('/account-settings/verification'), 'form' => $form_details ] );
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