<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Index;
use DB;

class IndexController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $index = DB::table('index')->where('id', $id)->get()->get(0);

      return view('admin.index')->withIndex($index);
    }

    public function update(Request $request)
    {
      $this->validate($request, array(
          'aboutContent' => 'required',
          'youtube' => 'required',
          'steam' => 'required',
          'discord' => 'required',
          'twitter' => 'required',
          'facebook' => 'required',
          'twitch' => 'required',
        ));

        DB::table('index')->where('id', '1')->update([
          'aboutContent' => $request->aboutContent,
          'youtube' => $request->youtube,
          'steam' => $request->steam,
          'discord' => $request->discord,
          'twitter' => $request->twitter,
          'facebook' => $request->facebook,
          'twitch' => $request->twitch
      ]);

        // Redirect
        return redirect()->route('home');
    }

    public function updateSM(Request $request, $id)
    {
      $this->validate($request, array(
          'youtube' => 'required',
          'steam' => 'required',
          'discord' => 'required',
          'twitter' => 'required',
          'facebook' => 'required',
          'twitch' => 'required',
        ));

        DB::table('index')->where('id', '1')->update([
          'youtube' => $request->youtube,
          'steam' => $request->steam,
          'discord' => $request->discord,
          'twitter' => $request->twitter,
          'facebook' => $request->faceboom,
          'twitch' => $request->twitch
      ]);

        // Redirect
        return redirect()->route('home');
    }
}
