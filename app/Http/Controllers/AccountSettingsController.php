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