<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use Auth;
use App\User;

class ArticleController extends Controller
{

  public function __construct() {
    $this->middleware('admin');

  }

    public function index()
    {
      return redirect('/news');
    }

    public function create()
    {
      $categories = Category::get();

      // $categories = $category->id + '=>' + $category->name;

      return view('news.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:5|max:255|unique:articles,title',
          'author' => 'required|min:5|max:255',
          'image' => 'required|max:255',
          'category_id' => 'required',
          'body' => 'required'
        ));

        // Store in DB
        $article = new Article;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        $article->category_id = $request->category_id;
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = str_slug($value);

        $article->save();

        // Redirect
        return redirect()->route('article.single', [$article->slug]);
    }

    public function show($id)
    {
      $article = Article::find($id);

      return view('news.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::find($id);

        return view('news.edit', compact('article'));
        // return view('news.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
      // Validate data
      $this->validate($request, array(
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'image' => 'required',
          'category_id' => 'required',
          'body' => 'required|min:50'
        ));

        $article = Article::find($id);

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        $article->category_id = $request->category_id;
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = str_slug($value);

        $article->save();

        // Redirect
        return redirect()->route('article.single', [$article->slug]);
    }

    public function destroy($id)
    {
      Article::destroy($id);

      return redirect('/news');
    }


}
