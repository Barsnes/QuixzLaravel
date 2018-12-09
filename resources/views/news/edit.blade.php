@extends('layouts.default')

@section('title'){{ $article->title }}@endsection

@section('stylesheets')
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection
@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="article">
  {!! Form::model($article, array('route' => array('news.update', $article->id), 'files' => true, 'method' => 'PUT')) !!}﻿
    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, array('class' => 'form-control')) }}

    {{ Form::label('author', 'Author:') }}
    {{ Form::text('author', null, array('class' => 'form-control')) }}

    {{ Form::label('image', 'Image:') }}
    {{ Form::text('image', null, array('class' => 'form-control')) }}

    {{ Form::label('category_id', 'Category:') }}
    {{ Form::select('category_id', [
        '1' => 'Counter Strike',
        '2' => 'Rocket League',
        '3' => 'League of Legends',
        '4' => 'News',
        '5' => 'Overwatch',
        '6' => 'Hearthstone'
      ]) }}
      <br>

    {{ Form::label('body', 'Body:')}}
    {{ Form::textarea('body', null, array('class' => 'form-control')) }}

    {{ Form::submit('Update', array('class' => 'btn btn-success btn-block')) }}
  {!! Form::close() !!}

  {!! Form::model($article, array('route' => array('news.destroy', $article->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
  {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) }}
  {!! Form::close() !!}
  <a class="btn btn-block btn-secondary" href="/news" style="color: #fff">Cancel</a>
</div>

<style>
  .btn {
    margin-top: 10px
  }

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

}


</style>

@endsection
