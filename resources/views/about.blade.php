@extends('layouts.default')
@section('title', 'About Us')

@section('content')

  <div class="about_body">
    <div class="about_content">

      <h1>{{ $about->title }}</h1>

      <p>
        {{-- @markdown($about->content) --}}
        @markdown
          {!! $about->content !!}
        @endmarkdown
      </p>

    </div>
  </div>


@endsection
