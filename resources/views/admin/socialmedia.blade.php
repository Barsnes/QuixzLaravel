@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Edit Index & Social Media</h1>
    <hr>
  {!! Form::model($social, array('route' => array('index.update', '1'), 'method' => 'PUT')) !!}﻿
    <div class="row">
      <div class="col">
        <label for="youtube">Youtube:</label>
        <input type="text" class="form-control" name="youtube" value="{{ $social->youtube }}">
      </div>
      <div class="col">
        <label for="youtube">Twitch:</label>
        <input type="text" class="form-control" name="twitch" value="{{ $social->twitch }}">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="youtube">Discord:</label>
        <input type="text" class="form-control" name="discord" value="{{ $social->discord }}">
      </div>
      <div class="col">
        <label for="youtube">Steam:</label>
        <input type="text" class="form-control" name="steam" value="{{ $social->steam }}">
      </div>
    </div>

<div class="row" style="margin-bottom:1rem">
    <div class="col">
      <label for="youtube">Twitter:</label>
      <input type="text" class="form-control" name="twitter" value="{{ $social->twitter }}">
    </div>
    <div class="col">
      <label for="youtube">Facebook:</label>
      <input type="text" class="form-control" name="facebook" value="{{ $social->facebook }}">
    </div>
</div>
      {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    </div>
    <hr>
  </div>
</div>

<script>
jQuery(function($) {
  $.slugify("Ätschi Bätschi"); // "aetschi-baetschi"
  $('#slug-target').slugify('#slug-source'); // Type as you slug

  $("#slug-target").slugify("#slug-source", {
  	separator: '_' // If you want to change separator from hyphen (-) to underscore (_).
  });
});
</script>

@endsection
