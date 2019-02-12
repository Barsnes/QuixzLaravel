@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x"></script>
  <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: false,
});
</script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Create New Post</h1>
    <hr>
    {!! Form::model($about, array('route' => array('about.update', '1'), 'files' => true, 'method' => 'PUT')) !!}﻿
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', $about->title, array('class' => 'form-control')) }}

      <label for="content">Content:</label>
      <textarea name="content" rows="20" cols="80">{{ $about->content }}</textarea>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>

<script>
// window.onbeforeunload = function (e) {
//   return 'Are you sure?';
// };
</script>

@endsection
