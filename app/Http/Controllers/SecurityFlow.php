<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class SecurityFlow extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
    
    public function choose () {
        return view( 'security-flow.step-1.choose', [ 'title' => 'Create Digital Security > Security Type' ] );
    }

    public function upload () {
        return view( 'security-flow.step-1.upload', [ 'title' => 'Create Digital Security > Upload Photos' ] );
    }

    public function details (Request $request) {
        return view( 'security-flow.step-1.details', [ 'title' => 'Create Digital Security > Upload Photos' ] )->with('data', $request->session()->get('security-flow'));
    }
    
    public function highlights (Request $request) {
        return view( 'security-flow.step-1.highlights', [ 'title' => 'Create Digital Security > Highlights' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function ownership (Request $request) {
        return view( 'security-flow.step-2.ownership', [ 'title' => 'Create Digital Security > Ownership' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function diligence (Request $request) {
        $userid = Auth::id();
        $company = DB::table('account_verification')
            ->where('userid', $userid)
            ->select('company_name')
            ->first();
        $data = $request->session()->get('security-flow');
        return view( 'security-flow.step-3.diligence', [ 'title' => 'Create Digital Security > Ownership' ] )->with(compact('company', 'data'));
    }

    public function keyPoints (Request $request) {
        return view( 'security-flow.step-4.key-points', [ 'title' => 'Create Digital Security > Key Points' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function capitalStack (Request $request) {
        return view( 'security-flow.step-5.capital-stack', [ 'title' => 'Create Digital Security > Capital Stack' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function meetSponsors (Request $request) {
        return view( 'security-flow.step-6.meet-sponsors', [ 'title' => 'Create Digital Security > Meet the Sponsors' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function preview (Request $request) {
        return view( 'security-flow.step-7.preview', [ 'title' => 'Create Digital Security > Preview' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function final (Request $request) {
        $userid = Auth::id();
        $company = DB::table('account_verification')
            ->where('userid', $userid)
            ->select('company_name')
            ->first();
        $bio = DB::table('account_verification')
            ->where('userid', $userid)
            ->value('bio');
        $data = $request->session()->get('security-flow');
        return view( 'security-flow.step-7.final', [ 'title' => 'Create Digital Security > Preview & Submit' ] )->with(compact('data', 'company', 'bio'));
    }

    public function display (Request $request) {
        dd($request->session()->get('account-settings.principles'));
    }

    // Save Data into a session
    public function saveData (Request $request, $e) {
        
        if ($e != 'keyPoints' && $e != 'meetSponsors') {
            $session_data = session( 'security-flow', array() );
            $session_data = array_merge( $session_data, $_POST );
            session( [ 'security-flow' => $session_data ] );
        } else {
            if ($e === 'keyPoints') {
                $request->session()->put('security-flow.key-points', $request->get('key-point'));
            } else if ($e === 'meetSponsors') {
                $request->session()->put('security-flow.principles', $request->get('principles'));
            }
        }
       

        switch ($e) {
            case "details":
                return redirect('/security-flow/step-1/highlights');
                break;
            case "highlights":
                return redirect('/security-flow/step-2/ownership');
                break;
            case "ownership":
                return redirect('/security-flow/step-3/diligence');
                break;
            case "keyPoints":
                return ('/security-flow/step-5/capital-stack');
                break;
            case "capitalStack":
                return redirect('/security-flow/step-6/meet-sponsors');
                break;
            default:
                return redirect('/security-flow/step-1/choose');
        }
    }

    // Submit Preview Data
    public function submitPreview(Request $request) {
        
        $session_data = session( 'security-flow', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'security-flow' => $session_data ] );

        $rules = [
            'target-investor-irr' => 'required',
            'investment-profile' => 'required',
            'funds-due' => 'required',
            'target-equity-multiple' => 'required',
            'minimum-investment' => 'required',
            'distribution-period' => 'required',
            'target-investment-period' => 'required',
            'property-type' => 'required',
            'sponsor-co-investment' => 'required',
            'target-avg-investor-cash-yield' => 'required',
            'offers-due' => 'required',
            'distribution-commencement' => 'required',
            'property' => 'required',
            'opportunity_type' => 'required',
            'opportunity_description' => 'required',
            'property_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'vacancy_rate' => 'required',
            'current_noi' => 'required',
            'annual_cash_flow' => 'required',
            '1031_exchange' => 'required',
            'market_value' => 'required',
            'square_footage' => 'required',
            'property_class' => 'required',
            'total_debt' => 'required',
            'payoff_date' => 'required',
            'loan-type' => 'required',
            'developed' => 'required',
            'pro-frorma-noi' => 'required',
            'distribution-frequency' => 'required',
            'equity-raise-floor-amount' => 'required',
            'total-capital-required' => 'required',
            'equity-raise-hard-cap' => 'required',
            'preferred-equity' => 'required',
            'common-equity' => 'required',
            'mezzanine-debt' => 'required',
            'senior-debt' => 'required'
        ];
        
        $this->validate($request, $rules);

        if (!empty($request->session()->get('security-flow.key-points'))) {
            $keyPoints = $request->session()->get('security-flow.key-points');
        }

        if (!empty($request->session()->get('capRead'))) {
            $capRead = json_encode($request->session()->get('capRead'));
        } else {
            $capRead = '';
        }

        if (isset($keyPoints)) {
            $userid = Auth::id();
            $payload = array(
                'userid' => $userid,
                'target-investor-irr' => $request->get('target-investor-irr'),
                'investment-profile' => $request->get('investment-profile'),
                'funds-due' => $request->get('funds-due'),
                'target-equity-multiple' => $request->get('target-equity-multiple'),
                'minimum-investment' => $request->get('minimum-investment'),
                'distribution-period' => $request->get('distribution-period'),
                'target-investment-period' => $request->get('target-investment-period'),
                'property-type' => $request->get('property-type'),
                'sponsor-co-investment' => $request->get('sponsor-co-investment'),
                'target-avg-investor-cash-yield' => $request->get('target-avg-investor-cash-yield'),
                'offers-due' => $request->get('offers-due'),
                'distribution-commencement' => $request->get('distribution-commencement'),
                'property' => $request->get('property'),
                'opportunity_type' => $request->get('opportunity_type'),
                'opportunity_description' => $request->get('opportunity_description'),
                'property_address' => $request->get('property_address'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'zip' => $request->get('zip'),
                'country' => $request->get('country'),
                'vacancy_rate' => $request->get('vacancy_rate'),
                'current_noi' => $request->get('current_noi'),
                'annual_cash_flow' => $request->get('annual_cash_flow'),
                '1031_exchange' => $request->get('1031_exchange'),
                'market_value' => $request->get('market_value'),
                'square_footage' => $request->get('square_footage'),
                'property_class' => $request->get('property_class'),
                'total_debt' => $request->get('total_debt'),
                'payoff_date' => $request->get('payoff_date'),
                'loan-type' => $request->get('loan-type'),
                'developed' => $request->get('developed'),
                'pro-frorma-noi' => $request->get('pro-frorma-noi'),
                'distribution-frequency' => $request->get('distribution-frequency'),
                'equity-raise-floor-amount' => $request->get('equity-raise-floor-amount'),
                'total-capital-required' => $request->get('total-capital-required'),
                'equity-raise-hard-cap' => $request->get('equity-raise-hard-cap'),
                'preferred-equity' => $request->get('preferred-equity'),
                'common-equity' => $request->get('common-equity'),
                'mezzanine-debt' => $request->get('mezzanine-debt'),
                'senior-debt' => $request->get('senior-debt'),
                'principles' => '',
                'captables' => $capRead,
                'key-points' => $keyPoints,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            );

            $id = DB::table('security_flow_property')->insertGetId($payload);
            if ($request->session()->get('security-flow-files')) {
                // dd($request->session()->get('account-verification'));
                $files = $request->session()->get('security-flow-files');
                foreach ($files as $key => $value) {
                    DB::table('files')
                        ->where('section', 'security-flow-files')
                        ->where('map', $value['map'])
                        // ->where('field', $value->field)
                        ->update(['section_id' => $id]);
                }  
            }
            $request->session()->forget('security-flow-files');
            $request->session()->forget('security-flow');
            $request->session()->forget('capRead');
            return view( 'security-flow.step-7.final', [ 'title' => 'Security Flow -> Preview & Submit', 'success' => true ] );

        } else {
            return view( 'security-flow.step-7.final', [ 'title' => 'Create Digital Security > Preview & Submit' ] )->with('data', $request->session()->get('security-flow'));
        }
    }
}
