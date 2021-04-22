<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    
    public function dashboard2() {
        return view('theme/principal');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myHome() {
        return view('myHome');
    }

    /**
     * Show the my users page.
     *
     * @return \Illuminate\Http\Response
     */
    public function myUsers() {
        return view('myUsers');
    }

}
