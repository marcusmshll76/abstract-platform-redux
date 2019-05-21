<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class SecurityFlow extends Controller
{
    public function choose () {
        return view( 'security-flow.step-1.choose', [ 'title' => 'Security Flow -> Choose Digital Securities' ] );
    }

    public function upload () {
        return view( 'security-flow.step-1.upload', [ 'title' => 'Security Flow -> Upload Photos' ] );
    }

    public function details (Request $request) {
        return view( 'security-flow.step-1.details', [ 'title' => 'Security Flow -> Upload Photos' ] )->with('data', $request->session()->get('security-flow'));
    }
    
    public function highlights (Request $request) {
        return view( 'security-flow.step-1.highlights', [ 'title' => 'Security Flow -> Highlights' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function ownership (Request $request) {
        return view( 'security-flow.step-2.ownership', [ 'title' => 'Security Flow -> Ownership' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function diligence () {
        return view( 'security-flow.step-3.diligence', [ 'title' => 'Security Flow -> Ownership' ] );
    }

    public function keyPoints (Request $request) {
        return view( 'security-flow.step-4.key-points', [ 'title' => 'Security Flow -> Key Points' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function capitalStack (Request $request) {
        return view( 'security-flow.step-5.capital-stack', [ 'title' => 'Security Flow -> Capital Stack' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function meetSponsors (Request $request) {
        return view( 'security-flow.step-6.meet-sponsors', [ 'title' => 'Security Flow -> Meet the Sponsors' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function preview (Request $request) {
        return view( 'security-flow.step-7.preview', [ 'title' => 'Security Flow -> Preview' ] )->with('data', $request->session()->get('security-flow'));
    }

    public function final (Request $request) {
        return view( 'security-flow.step-7.final', [ 'title' => 'Security Flow -> Preview & Submit' ] )->with('data', $request->session()->get('security-flow'));
    }

    // Save Data into a session
    public function saveData (Request $request, $e) {

        $session_data = session( 'security-flow', array() );
        $session_data = array_merge( $session_data, $_POST );
        session( [ 'security-flow' => $session_data ] );

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
                return redirect('/security-flow/step-5/capital-stack');
                break;
            case "capitalStack":
                return redirect('/security-flow/step-6/meet-sponsors');
                break;
            case "meetSponsors":
                return redirect('/security-flow/step-7/preview');
                break;
            default:
                return redirect('/security-flow/step-1/choose');
        }
    }
}
