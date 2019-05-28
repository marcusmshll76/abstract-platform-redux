<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecurityFundFlow extends Controller
{
    public function choose () {
        return view( 'security-fund-flow.step-1.choose', [ 'title' => 'Create Digital Security > Security Type' ] );
    }

    public function upload () {
        return view( 'security-fund-flow.step-1.upload', [ 'title' => 'Create Digital Security > Upload Photos' ] );
    }

    public function details (Request $request) {
        return view( 'security-fund-flow.step-1.details', [ 'title' => 'Create Digital Security > Upload Photos' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function detailsno (Request $request) {
        return view( 'security-fund-flow.step-1.details-no', [ 'title' => 'Create Digital Security > Upload Photos' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function highlights (Request $request) {
        return view( 'security-fund-flow.step-1.highlights', [ 'title' => 'Create Digital Security > Highlights' ] )->with('data', $request->session()->get('security-fund-flow'));
    }
    
    public function ownership (Request $request) {
        return view( 'security-fund-flow.step-2.ownership', [ 'title' => 'Create Digital Security > Ownership' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function diligence () {
        return view( 'security-fund-flow.step-3.diligence', [ 'title' => 'Create Digital Security > Ownership' ] );
    }
  
    public function keyPoints (Request $request) {
        return view( 'security-fund-flow.step-4.key-points', [ 'title' => 'Create Digital Security > Key Points' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function capitalStack (Request $request) {
        return view( 'security-fund-flow.step-5.capital-stack', [ 'title' => 'Create Digital Security > Capital Stack' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function meetSponsors (Request $request) {
        return view( 'security-fund-flow.step-6.meet-sponsors', [ 'title' => 'Create Digital Security > Meet the Sponsors' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function preview (Request $request) {
        return view( 'security-fund-flow.step-7.preview', [ 'title' => 'Create Digital Security > Preview' ] )->with('data', $request->session()->get('security-fund-flow'));
    }

    public function final (Request $request) {
        $userid = Auth::id();
        $bio = DB::table('account_verification')
            ->where('userid', $userid)
            ->value('bio');
        $data = $request->session()->get('security-flow');
        
        return view( 'security-fund-flow.step-7.final', [ 'title' => 'Create Digital Security > Preview & Submit' ] )->with(compact('data', 'bio'));
    }

    // Save Data into a session
    public function saveData (Request $request, $e) {
        
        if ($e != 'keyPoints' && $e != 'meetSponsors') {
            $session_data = session( 'security-fund-flow', array() );
            $session_data = array_merge( $session_data, $_POST );
            session( [ 'security-fund-flow' => $session_data ] );
        } else {
            $session_data = session( 'security-fund-flow', array() );
            $session_data = array_merge( $session_data, $request->all() );
            session( [ 'security-fund-flow' => $session_data ] );
        }
       
        switch ($e) {
            case "details":
                return redirect('/security-fund-flow/step-1/highlights');
                break;
            case "highlights":
                return redirect('/security-fund-flow/step-2/ownership');
                break;
            case "ownership":
                return redirect('/security-fund-flow/step-3/diligence');
                break;
            case "keyPoints":
                return ('/security-fund-flow/step-5/capital-stack');
                break;
            case "capitalStack":
                return redirect('/security-fund-flow/step-6/meet-sponsors');
                break;
            case "meetSponsors":
                return ('/security-fund-flow/step-7/preview');
                break;
            default:
                return redirect('/security-fund-flow/step-1/choose');
        }
    }

    // Submit Preview Data
    public function submitPreview(Request $request) {
        $session_data = session( 'security-fund-flow', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'security-fund-flow' => $session_data ] );

        // Validations
        $condRule = [];
        if ($request->get('fund-type') === 'Yes') {
            $condRule = [
                'vacancy-rate' => 'required',
                'proforma-current-noi' => 'required',
                'annual-cash-flow' => 'required',
                '1031-exchange' => 'required',
                'market-value' => 'required',
                'square-footage' => 'required',
                'property-class' => 'required',
                'total-debt' => 'required',
                'payoff-date' => 'required',
                'loan-type' => 'required',
                'developed' => 'required'
            ];
        } else {
            $condRule = [
                'existing-properties' => 'required' 
            ];
        }
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
            'fund-name' => 'required',
            'opportunity-type' => 'required',
            'type-of-fund' => 'required',
            'capital-origin' => 'required',
            'fund-address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'fund-description' => 'required',
            'investor-first-name' => 'required',
            'investor-last-name' => 'required',
            'ownership' => 'required',
            'investor-first-name-1' => 'required',
            'investor-last-name-1' => 'required',
            'ownership-1' => 'required',
            'investor-first-name-2' => 'required',
            'investor-last-name-2' => 'required',
            'ownership-2' => 'required',
            'minimum-raise-amount' => 'required',
            'distribution-frequency' => 'required',
            'maximum-raise-amount' => 'required',
            'total-capital-required' => 'required',
            'preferred-equity' => 'required',
            'common-equity' => 'required',
            'mezzanine-debt' => 'required',
            'senior-debt' => 'required'
        ];
        $rules = array_merge( $rules, $condRule );
        $this->validate($request, $rules);
        
        if (isset($request->session()->get('security-fund-flow')['key-point'])) {
            $keyPoints = $request->session()->get('security-fund-flow')['key-point'];
        }

        if (isset($request->session()->get('security-fund-flow')['principles'])) {
            $principles = $request->session()->get('security-fund-flow')['principles'];
        }

        if (isset($keyPoints) && isset($principles)) {
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
                'fund-name' => $request->get('fund-name'),
                'opportunity-type' => $request->get('opportunity-type'),
                'type-of-fund' => $request->get('type-of-fund'),
                'capital-origin' => $request->get('capital-origin'),
                'fund-address' => $request->get('fund-address'),
                'city' => $request->get('city'),
                'state' => $request->get('state'),
                'zip' => $request->get('zip'),
                'country' => $request->get('country'),
                'fund-description' => $request->get('fund-description'),
                'investor-first-name' => $request->get('investor-first-name'),
                'investor-last-name' => $request->get('investor-last-name'),
                'ownership' => $request->get('ownership'),
                'investor-first-name-1' => $request->get('investor-first-name-1'),
                'investor-last-name-1' => $request->get('investor-last-name-1'),
                'ownership-1' => $request->get('ownership-1'),
                'investor-first-name-2' => $request->get('investor-first-name-2'),
                'investor-last-name-2' => $request->get('investor-last-name-2'),
                'ownership-2' => $request->get('ownership-2'),
                'minimum-raise-amount' => $request->get('minimum-raise-amount'),
                'distribution-frequency' => $request->get('distribution-frequency'),
                'maximum-raise-amount' => $request->get('maximum-raise-amount'),
                'total-capital-required' => $request->get('total-capital-required'),
                'preferred-equity' => $request->get('preferred-equity'),
                'common-equity' => $request->get('common-equity'),
                'mezzanine-debt' => $request->get('mezzanine-debt'),
                'senior-debt' => $request->get('senior-debt'),
                'vacancy-rate' => $request->get('vacancy-rate'),
                'proforma-current-noi' => $request->get('proforma-current-noi'),
                'annual-cash-flow' => $request->get('annual-cash-flow'),
                '1031-exchange' => $request->get('1031-exchange'),
                'market-value' => $request->get('market-value'),
                'square-footage' => $request->get('square-footage'),
                'property-class' => $request->get('property-class'),
                'total-debt' => $request->get('total-debt'),
                'payoff-date' => $request->get('payoff-date'),
                'loan-type' => $request->get('loan-type'),
                'developed' => $request->get('developed'),
                'existing-properties' => $request->get('existing-properties'),
                'principles' => json_encode($principles),
                'key-points' => $keyPoints
            );

            DB::table('security_fund_flow')->insert($payload);
            
            return view( 'security-fund-flow.step-7.final', [ 'title' => 'Create Digital Security -> Preview & Submit', 'success' => true ] );
            
        } else {
            // return view('security-fund-flow.step-7.final', [ 'title' => 'Create Digital Security > Preview & Submit' ])->with('data', $request->session()->get('security-fund-flow'));
        } 
    }
}
