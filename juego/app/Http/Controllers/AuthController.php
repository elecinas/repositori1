<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\TokenController;

class AuthController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            //$token = auth()->user()->createToken('Personal Access Token')->accessToken;
            $id = auth()->user()->id;
            $user = User::find($id);
            request()->session()->regenerate(); //Se encarga de evitar session fixation regenerando el token csrf

            //return response()->json($user, 200);
            return redirect()->route('home', ['user' => $user]);

        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
               // return response()->json($data, 200);
    }

    public function register(){
        return view('auth.register');
    }

    public function update(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,{$this->user->id}',
            'name' => 'required|unique:users,name,{$this->user->id}',
            'password' => 'required|min:8'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //$token = $user->createToken('Personal Acces Token')->accessToken;

        //return response()->json(['token' => $token], 200);
        return response()->json(['user' => $user], 200);
    }

    public function logout(Request $request) {
        
        if (Auth::check()) {
            //$user = Auth::user()->token();
           // $user->revoke();
           Auth::logout();
        }
        //$token = Auth::user()->token();
        //$token->revoke();
        /*
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
        */
       // return view('home');
       return redirect()->route('home');
    }
}
