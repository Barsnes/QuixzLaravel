@extends('layouts.app')

@section('content')
  <div class="col-md-12 offset-2" style="margin-bottom:5rem">
    <h1>Add new game</h1>
    <hr>
    {!! Form::open(['route' => 'games.store', 'files' => true]) !!}
    <label for="name">Name of game:</label>
    <input type="text" name="name">
    {{ Form::submit('Add', array('class' => 'btn btn-success')) }}
  {!! Form::close() !!}
  <hr>
  </div>
  <div class="col-md-12 offset-2">
    <h1>Games</h1>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($games as $game)
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $game->name }}</h5>
              {!! Form::model($game, array('route' => array('games.destroy', $game->id), 'method' => 'DELETE')) !!}﻿
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
              {!! Form::close() !!}
            </div>
          </div>
        @endforeach
    </div>
  </div>

<style media="screen">
  body {
    width: 100vw;
    overflow-x: hidden
  }
</style>
@endsection
