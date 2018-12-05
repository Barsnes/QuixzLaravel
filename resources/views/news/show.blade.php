@extends('layouts.default')
@section('title'){{ $article->title }}@endsection

@section('content')

<div class="article">
  <img src="{{ $article->image }}" alt="dummy text" og:image></img>

  <h1>{{ $article->title }}</h1>
  <h5 style="font-size:.9em; color:#FFF; letter-spacing:1px">Written by {{ $article->author }}</h5>
  <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
  <hr>
  @markdown
    {{ $article->body }}
  @endmarkdown
</div>

<div class="comments">
  <div
  class="just-comments"
  data-apikey="35043f7d-0c9b-4bc8-8cf5-73f1c94f0489">
  </div>
</div>


<style>

  body {
    background-color: #2B63AF
  }

  .article {
    color: #000;
    width: 650px;
    margin: 0 calc((100% - 650px) / 2);
    padding-top: 1em;
    color: #FFF;
    margin-bottom: 10em;
    min-height: 100vh
  }

  .article img {
    width: 100%;
    height: auto;
    box-shadow: 0 0 30px #00000070
  }

  .article p {
    font-family: "Lato"
  }

  .article a {
    color: #F8B52A;
    text-decoration: none
  }

  .article h1 {
    margin-bottom: .2em
  }

  .article h5 {
    font-family: "Lato";
    padding: 0;
    margin: 0 .1rem;
    color: #F8B52A;
  }

  .article strong {
    color: #F8B52A
  }


  .comments {
    width: 650px;
    margin: 0 calc((100% - 650px) / 2);
  }

  .comments a {
    color: #F8B52A;
  }

@media (max-width:1050px) {

  .article {
    width: 100%;
    margin: 0;
  }

  .article p {
    padding: 0 1em
  }

  .article h1 {
    padding: 0 .5em
  }

  .article h5 {
    padding: 0 1rem;
  }

  .article hr {
    margin: .5em;
  }

  .comments {
    width: 100%;
    margin: 0;
  }
}


</style>

@endsection
