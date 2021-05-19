<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    { 
        $request->authenticate();
        
        //--STARTS-- crear accesstoken
        $user = Auth::user();
        $token = $user->createToken('ElToken')->accessToken;
        //--ENDS-- crear accesstoken

        $request->session()->regenerate();
        //$response = ['token' => $token];
        $myRequest = new Request();
        $myRequest->request->add(['user'=> $user, 'token' => $token]);
        //dd($myRequest);


        //return view('home', $response);
        //return redirect()->route('home', $response);

        return redirect()->route('home', $myRequest);
        //return redirect()->route('home' , ['response' => $response]);
        //return response()->json($response, 200);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
