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
    <h1>Edit {{ $team->name }}</h1>
    <hr>
    {!! Form::model($team, array('route' => array('teams.update', $team->id), 'files' => true, 'method' => 'PUT')) !!}﻿
    <div class="row">
      <div class="col">
        <label for="image" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Background Image: <em class="text-muted">Keep under: 1920x1080</em></label>
        {{ Form::file('image', array('class' => 'form-control')) }}
      </div>
      <div class="col">
        <label>Current Image:</label>
        <img style="width: 100%" src="{{ asset('images/' . $team->image) }}" alt="">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="body">About Team</label>
        <textarea name="body" class="form-control" rows="10">{{ $team->body }}</textarea>
      </div>
    </div>

<div class="row" style="margin: 2rem 0 2rem 0; background-color: rgb(248, 181, 42); padding: 1rem 0 2rem 0; color: #fff; border-radius: 7px">
    <div class="col">
      <label for="wins">Wins:</label>
      <input class="form-control" type="number" min="0" value="{{ $team->wins }}" name="wins">
    </div>
    <div class="col">
      <label for="loss">Losses:</label>
      <input class="form-control" type="number" min="0" value="{{ $team->loss }}" name="loss">
    </div>
</div>
      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
