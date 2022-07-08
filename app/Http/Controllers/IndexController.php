<?php

namespace App\Http\Controllers;

use App\Index;
use DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

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
        $this->validate($request, [
            'aboutContent' => 'required',
            'youtube' => 'required',
            'steam' => 'required',
            'discord' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'twitch' => 'required',
        ]);

        DB::table('index')->where('id', '1')->update([
            'aboutContent' => $request->aboutContent,
            'youtube' => $request->youtube,
            'steam' => $request->steam,
            'discord' => $request->discord,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'twitch' => $request->twitch,
        ]);

        // Redirect
        return redirect()->route('home');
    }

    public function updateSM(Request $request, $id)
    {
        $this->validate($request, [
            'youtube' => 'required',
            'steam' => 'required',
            'discord' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'twitch' => 'required',
        ]);

        DB::table('index')->where('id', '1')->update([
            'youtube' => $request->youtube,
            'steam' => $request->steam,
            'discord' => $request->discord,
            'twitter' => $request->twitter,
            'facebook' => $request->faceboom,
            'twitch' => $request->twitch,
        ]);

        // Redirect
        return redirect()->route('home');
    }
}
