<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Picture;
use App\Models\User;

class PictureController extends Controller
{
    public function index($id)
    {   
        $pictures = Picture::where('shop_id', $id)->get();
        return response()->json($pictures, 200);
    }
   
    public function store(Request $request, $id)
    {
       /* $request->validate([
            'name' => 'required',
            'name_fake' => 'required',
            'author' => 'nullable',
            'price' => 'required',
            'price_fake' => 'required',
            'description' => 'required',
            'description_fake' => 'required',
            'photo' => 'required',
            'photo_fake' => 'required',
            'date_arrival' => 'required|date'
        ]);*/
        
        
        $picture = Picture::create($request->all());
        return response()->json($picture, 200);
    }
    
    public function update(Request $request, Shop $shop, Picture $picture)
    {   
        $picture->update($request->all());
        return response()->json($picture, 200);
    }

    public function destroy( Shop $shop, Picture $picture)
    {       
        $picture->delete();
        return response()->json($picture, 200);
    }

    public function destroyAllPictures( $id )
    {      
        $pictures = Picture::where('shop_id', $id)->delete();
        return response()->json($pictures, 200);
    }
}
