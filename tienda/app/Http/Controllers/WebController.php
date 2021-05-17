<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Picture;
use App\Models\User;

class WebController extends Controller
{
    public function fakeHome(){
        $collars = Picture::all();
        return view('fake_home')->with('collars', $collars);//crear vistas!!
    }

    public function homeToken($id){
        return redirect()->route('home.token');
    }
}
