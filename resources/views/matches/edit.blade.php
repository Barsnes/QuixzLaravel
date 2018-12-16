@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Edit {{ $match->name }}</h1>
    <hr>
  {!! Form::model($match, array('route' => array('matches.update', $match->id), 'files' => true, 'method' => 'PUT')) !!}﻿
    <div class="row" style="margin: 2rem 0 2rem 0; background-color: rgb(248, 181, 42); padding: 1rem 0 2rem 0; color: #fff; border-radius: 7px">

      <div class="col">
        <label for="date">Quixz Score:</label>
        <input class="form-control" type="number" min="0" value="{{ $match->quixzScore }}" name="quixzScore">
      </div>
      <div class="col">
        <label for="date" value="{{ $match->date }}">Enemy Score:</label>
        <input class="form-control" type="number" min="0" value="{{ $match->enemyScore }}" name="enemyScore">
      </div>

    </div>
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', null, array('class' => 'form-control')) }}

      {{ Form::label('link', 'Link:') }}
      {{ Form::text('link', null, array('class' => 'form-control')) }}

      <div class="row">
<div class="col">
        <label for="date">Date:</label>
        <input value="{{ date('Y-m-d', strtotime($match->date)) }}" class="form-control" type="date" name="date">
</div>
<div class="col">
        <label for="date">Time:</label>
        <input class="form-control" type="time" name="time">
</div>
      </div>

      <div class="row">
<div class="col">
        <label for="enemy">Enemy:</label>
        <input value="{{ $match->enemy }}" class="form-control" type="text" name="enemy">
</div>
<div class="col">
  {{ Form::label('enemyLogo', 'Enemy Logo:') }}
  {{ Form::file('enemyLogo', array('class' => 'form-control')) }}
</div>
<div class="col">
  <h5>Current Enemy Logo:</h5>
  <img src=" {{ asset('images/' . $match->enemyLogo) }} " alt="">
</div>
      </div>

      <label for="tournament_id">Tournament (optional)</label>
      <input value="{{ $match->tournament_id }}" class="form-control" type="text" name="tournament_id">
      <div class="row" style="margin-top:2rem;">

      {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}

    {!! Form::model($match, array('route' => array('matches.destroy', $match->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {!! Form::close() !!}
    <a class="btn btn-secondary" href="/admin/matches" style="color: #fff">Cancel</a>
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
