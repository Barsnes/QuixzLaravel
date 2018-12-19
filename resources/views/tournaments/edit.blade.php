@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Add new tournament</h1>
    <hr>
    {!! Form::model($tournament, array('route' => array('tournaments.update', $tournament->id), 'files' => true, 'method' => 'PUT')) !!}﻿
    <div class="row">
      <div class="col">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{ $tournament->name }}">
      </div>
      <div class="col">
        <label for="link">Tournament Link:</label>
        <input type="text" name="link" value="{{ $tournament->link }}" class="form-control">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="team_id">Team:</label>
        <select name="team_id" class="form-control">
          <option value="{{ $tournament->team->id }}">{{ $tournament->team->name }}</option>
        </select>
      </div>
      <div class="col">
        <label for="format">Format</label>
        <select class="form-control" name="format">
          <option value="{{ $tournament->format }}">{{ $tournament->format }}</option>
          <option value="Best of One">Best of One</option>
          <option value="Best of Three">Best of Three</option>
        </select>
      </div>
    </div>

  <div class="row">
      <div class="col">
        <label for="image">Size: 300x300</em></label>
        {{ Form::file('image', array('class' => 'form-control')) }}
      </div>
    <div class="col">
      <label for="">Current Image:</label> <br>
      <img src="{{ asset('/images/' . $tournament->image) }}" alt="">
    </div>
  </div>

    <div class="row">
      <div class="col">
        <label for="date">Date:</label>
        <input value="{{ date('Y-m-d', strtotime($tournament->date)) }}" class="form-control" type="date" name="date">
      </div>
      <div class="col">
            <label for="date">Time:</label>
            <input class="form-control" type="time" name="time">
      </div>
    </div>

<div class="row" style="margin-left:.05rem; margin-top:1rem">
      {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    {!! Form::model($tournament, array('route' => array('tournaments.destroy', $tournament->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {!! Form::close() !!}
    <hr>
</div>
  </div>
</div>
@endsection
