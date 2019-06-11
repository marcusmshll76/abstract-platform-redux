<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SponsorController extends Controller {
    public function welcome() {
        return view('sponsors.welcome');
    }
    public function intro() {
        return view('sponsors.intro');
    }
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.details');
    }
}