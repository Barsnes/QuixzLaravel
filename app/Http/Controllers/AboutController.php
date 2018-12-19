<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{

    public function index()
    {
      $about = DB::table('about')->where('id', '1')->get()->get(0);
      return view('admin.about')->withAbout($about);
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, array(
          'title' => 'required|min:5',
          'content' => 'required|min:50'
        ));

        DB::table('about')->where('id', '1')->update([
          'title' => $request->title,
          'content' => $request->content
      ]);;

        // Redirect
        return redirect()->route('home');
    }
}
