@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>


<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Create New Match for Tournament</h1>
    <hr>
{!! Form::model($match, array('route' => array('tourn-match.update', $match->id), 'files' => true, 'method' => 'PUT')) !!}﻿
<div class="row">
  <div class="col">
    <label for="match_num">Match Number:</label>
    <input class="form-control" type="number" min="0" value="{{ $match->match_num }}" name="match_num">
  </div>
  <div class="col">
      <label for="tournament_id">Tournament:</label> <br>
      <h3>{{ $tournament->name }}</h3>
  </div>
</div>

      <div class="row">
<div class="col">
        <label for="date">Date:</label>
        <input value="{{ $match->date }}" class="form-control" type="date" name="date">
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
      </div>

      <div class="row" style="margin: 2rem 0 2rem 0; background-color: rgb(248, 181, 42); padding: 1rem 0 2rem 0; color: #fff; border-radius: 7px">

        <div class="col">
          <label for="quixzScore">Quixz Score:</label>
          <input class="form-control" type="number" min="0" value="{{ $match->quixzScore }}" name="quixzScore">
        </div>
        <div class="col">
          <label for="enemyScore">Enemy Score:</label>
          <input class="form-control" type="number" min="0" value="{{ $match->enemyScore }}" name="enemyScore">
        </div>

      </div>
<div class="row" style="margin-left:.1rem;">
      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    {!! Form::model($match, array('route' => array('tourn-match.destroy', $match->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
      {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
</div>
@endsection
