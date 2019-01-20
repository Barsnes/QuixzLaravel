<?php

namespace App\Http\Controllers;
use Auth;
use App\Management;
use Image;

use Illuminate\Http\Request;

class ManagementController extends Controller
{

    public function __construct() {
      $this->middleware('admin');
    }

    public function index()
    {
      $people = Management::get()->all();
      return view('admin.management')->withPlayers($people);
    }

    public function create()
    {
      return view('management.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'name' => 'required|min:7|unique:management,name',
          'email' => 'required|email',
          'job_title' => 'required',
          'image' => 'image',
          'body' => '',
        ));

        // Store in DB
        $person = new Management;

        $person->name = $request->name;
        $person->image = 'avatar.png';
        $person->email = $request->email;
        $person->body = $request->body;
        $person->job_title = $request->job_title;
        $person->steam = $request->steam;
        $person->instagram = $request->instagram;
        $person->twitter = $request->twitter;
        $person->youtube = $request->youtube;
        $person->twitch = $request->twitch;

        $value = $person->name;
        $person->slug = str_slug($value);

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $info = getimagesize($image);
          $extension = image_type_to_extension($info[2]);
          $filename = time() . $extension;
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(500, 500)->save($location);

          $person->image = $filename;
        }

        $person->save();

        // Redirect
        return redirect('/admin');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
      $person = Management::find($id);
      return view('management.edit')->withPerson($person);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, array(
          'email' => 'required|email',
          'job_title' => 'required',
          'image' => 'image',
          'body' => '',
        ));

      $person = Management::find($id);

      $person->email = $request->email;
      $person->body = $request->body;
      $person->job_title = $request->job_title;
      $person->steam = $request->steam;
      $person->instagram = $request->instagram;
      $person->twitter = $request->twitter;
      $person->youtube = $request->youtube;
      $person->twitch = $request->twitch;


      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time() . $extension;
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(500, 500)->save($location);

        $person->image = $filename;
      }

      $person->save();

      // Redirect
      return redirect('/admin');
    }

    public function destroy($id)
    {
        //
    }
}
