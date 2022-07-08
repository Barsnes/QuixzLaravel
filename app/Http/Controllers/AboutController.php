<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

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
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:50',
        ]);

        DB::table('about')->where('id', '1')->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect
        return redirect()->route('home');
    }
}
