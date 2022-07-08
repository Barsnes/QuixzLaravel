<?php

namespace App\Http\Controllers;

use App\Article;
use App\Team;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;
use WebP;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $articles = Article::get();

        return view('admin.news')->withArticles($articles);
    }

    public function create()
    {
        $categories = Team::get();

        // $categories = $category->id + '=>' + $category->name;

        return view('news.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'title' => 'required|min:5|max:255|unique:articles,title',
            'author' => 'required|min:5|max:255',
            'image' => 'required|image',
            'team_id' => '',
            'body' => 'required',
        ]);

        // Store in DB
        $article = new Article;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->image = $request->image;
        if ($request->team_id == 'null') {
            $article->team_id = '';
        } else {
            $article->team_id = $request->team_id;
        }
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = str_slug($value);

        // image
        $image = $request->file('image');
        $info = getimagesize($image);
        $extension = image_type_to_extension($info[2]);
        $filename = time().$extension;
        $location = public_path('images/'.$filename);
        Image::make($image)->resize(1200, 600)->save($location);

        $article->image = $filename;

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
        $categories = Team::get();

        return view('news.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate data
        $this->validate($request, [
            'title' => 'required|min:5',
            'author' => 'required|min:5',
            'team_id' => '',
            'body' => 'required',
        ]);

        $article = Article::find($id);

        $article->title = $request->title;
        $article->author = $request->author;
        if ($request->team_id == 'null') {
            $article->team_id = '';
        } else {
            $article->team_id = $request->team_id;
        }
        $article->body = $request->body;

        $value = $article->title;
        $article->slug = str_slug($value);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $info = getimagesize($image);
            $extension = image_type_to_extension($info[2]);
            $filename = time().$extension;
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(1200, 600)->save($location);

            $article->image = $filename;
        }

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
