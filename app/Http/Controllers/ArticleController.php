<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect('/news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'image' => 'required',
          'body' => 'required|min:50'
        ));

        // Store in DB
        $article = new Article;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        $article->body = $request->body;

        $article->save();

        // Redirect
        return redirect()->route('news.show', [$article->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $article = Article::find($id);

      return view('news.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('news.edit', compact('article'));
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
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'image' => 'required',
          'body' => 'required|min:50'
        ));

        $article = Article::find($id);

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        $article->body = $request->body;

        $article->save();

        // Redirect
        return redirect()->route('news.show', [$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Article::destroy($id);

      return redirect('/news');
    }


}
