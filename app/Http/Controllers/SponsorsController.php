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
      $sponsors = Sponsor::get();
      return view('admin.sponsors')->withSponsors($sponsors);
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);

        $sponsor->delete();

        return back()->withSuccess('Deleted!');
    }
}
