<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Picture;
use App\Models\User;

class WebController extends Controller
{
    public function viewShop($id){
        $pictures = Picture::where('shop_id', '==', $id);
        return view('')->with('pictures', $pictures);//crear vistas!!
    }
}
