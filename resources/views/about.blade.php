@extends('layouts.default')
@section('title', 'About')

@section('content')

@foreach ($about as $about)

  <div class="about_body">
    <div class="about_content">

      <h1>{{ $about->title }}</h1>

      <p>
        @markdown
        {{  $about->content }}
        @endmarkdown
      </p>

    </div>
  </div>

@endforeach

@endsection
