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

    public function keyPoints () {
        return view( 'security-flow.step-4.key-points', [ 'title' => 'Security Flow -> Key Points' ] );
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
            default:
                echo "default";
        }
    }
}
