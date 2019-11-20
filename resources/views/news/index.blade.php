@extends('layouts.default')
@section('title', 'News')

@section('content')

@php
  $articleCount = 0;
@endphp

<div class="article--body">
  @foreach ($articles->reverse() as $article)
    @php
      $articleCount ++;
    @endphp
      <a class="article--body__card" href=" {{ url('/news', $article->slug) }}">
        <img src="{{ asset('/images/' . $article->image) }}" alt="some dummy text" og:image>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <h2>{{ $article->title }}</h2>
        @if ($articleCount == 1)
          <p class="news__desc">{!! strip_tags(substr($article->body, 0, 150)) !!}...</p>
          <p>Read more...</p>
        @endif
      </a>
  @endforeach
</div>
@endsection
