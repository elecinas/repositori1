<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Picture;
use App\Models\User;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $pictures = Picture::where('shop_id', $id)->get();
        
        return response()->json($pictures, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        $picture = new Picture();
        $picture->name = $request->name;
        $picture->name_fake = $request->name_fake;
        $picture->author = $request->author;
        $picture->price = $request->price;
        $picture->price_fake = $request->price_fake;
        $picture->description = $request->description;
        $picture->description_fake = $request->description_fake;
        $picture->photo = $request->photo;
        $picture->photo_fake = $request->photo_fake;
        $picture->date_arrival = $request->date_arrival;
        $picture->shop_id = $id;
        $picture->save();
        
        return response()->json($picture, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Picture::where('shop_id', $id)->get();
        Picture::where('shop_id', $id)->delete();
        
        return response()->json($picture, 200);
    }
}
