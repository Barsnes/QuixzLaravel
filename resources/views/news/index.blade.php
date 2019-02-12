@extends('layouts.default')
@section('title', 'News')

@section('content')
<div class="article--body">
  @foreach ($articles as $article)
      <a class="article--body__card" href=" {{ url('/news', $article->slug) }}">
        <img src="{{ asset('/images/' . $article->image) }}" alt="some dummy text" og:image>
        <h2>{{ $article->title }}</h2>
      </a>
  @endforeach
</div>
@endsection
