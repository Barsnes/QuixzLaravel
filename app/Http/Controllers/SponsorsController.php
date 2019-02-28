<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Sponsor;

class SponsorsController extends Controller
{

    public function __construct() {
      $this->middleware('admin');
    }

    public function index()
    {
        //
    }

    public function create()
    {
      return view('sponsors.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'name' => 'required',
          'website' => 'required|url',
          'image' => 'required|file',
          'active' => 'required|boolean',
        ));

        // Store in DB
        $sponsor = new Sponsor;

        $sponsor->name = $request->name;
        $sponsor->website = $request->website;
        $sponsor->active = $request->active;


        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->save($location);

          $sponsor->image = $filename;
        }

        $sponsor->save();

        // Redirect
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
