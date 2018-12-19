@extends('layouts.default')
@section('title', 'About Us')

@section('content')

  <div class="about_body">
    <div class="about_content">

      <h1>{{ $about->title }}</h1>

      <p>
        {{-- @markdown($about->content) --}}

          {!! $about->content !!}

      </p>

    </div>
  </div>


<style media="screen">
  .about_content img {
    width: 100%;
    height: 100%
  }
</style>

@endsection
