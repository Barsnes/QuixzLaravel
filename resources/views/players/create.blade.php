@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Add new player</h1>
    <hr>
    {!! Form::open(['route' => 'players.store', 'files' => true]) !!}
    <div class="row">
      <div class="col">
        <label for="firstName">First Name:</label>
        <input class="form-control" type="text" name="firstName">
      </div>
      <div class="col">
        <label for="playerName">Player Name:</label>
        <input class="form-control" type="text" name="playerName">
      </div>
      <div class="col">
            <label for="lastName">Last Name:</label>
            <input class="form-control" type="text" name="lastName">
    </div>
</div>
<div class="row">
  <div class="col">
    <label for="game_id">Game:</label>
    <select name="game_id" class="form-control">
      <option value="">Choose One</option>
      @foreach ($games as $game)
          <option value="{{ $game->id }}">{{ $game->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col">
    {{ Form::label('image', 'Image:') }}
    {{ Form::file('image', array('class' => 'form-control')) }}
  </div>
  <div class="col">
    <label for="active">Active</label>
    <select class="form-control" name="active">
      <option>Choose One</option>
      <option value="true">Active</option>
      <option value="false">Inactive</option>
    </select>
  </div>
</div>


        <div class="row" style="margin-top:2rem">
          <div class="col">
            <h2>Social Media:</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="date">Steam:</label>
            <input class="form-control" type="text" name="steam">
          </div>
          <div class="col">
            <label for="date">Twitter:</label>
            <input class="form-control" type="text" name="twitter">
          </div>
          <div class="col">
            <label for="date">Youtube:</label>
            <input class="form-control" type="text" name="youtube">
          </div>
        </div>
        <div class="row" style="margin-bottom:2rem">
          <div class="col">
            <label for="date">Twitch:</label>
            <input class="form-control" type="text" name="twitch">
          </div>
          <div class="col">
            <label for="date">Instagram:</label>
            <input class="form-control" type="text" name="instagram">
          </div>
        </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
