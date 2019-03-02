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
    <h1>Edit {{ $player->playerName }}</h1>
    <hr>
    {!! Form::model($player, array('route' => array('players.update', $player->id), 'files' => true, 'method' => 'PUT')) !!}﻿
    <div class="row">
      <div class="col">
        <label for="firstName">First Name:</label>
        <input value="{{ $player->firstName }}" class="form-control" type="text" name="firstName">
      </div>
      <div class="col">
        <label for="playerName">Player Name:</label>
        <input value="{{ $player->playerName }}" class="form-control" type="text" name="playerName">
      </div>
      <div class="col">
            <label for="lastName">Last Name:</label>
            <input value="{{ $player->lastName }}" class="form-control" type="text" name="lastName">
    </div>
</div>
<div class="row">
  <div class="col">
    <label for="team_id">Team:</label>
    <select name="team_id" class="form-control">
      <option value="{{ $player->team->id }}">{{ $player->team->name }}</option>
      @foreach ($teams as $team)
          <option value="{{ $team->id }}">{{ $team->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="col">
    <label for="image" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Image: <em class="text-muted">Size: 150x150</em></label>
    {{ Form::file('image', array('class' => 'form-control')) }}
  </div>
  <div class="col">
    <h5>Current image:</h5>
    <img src="{{ asset('images/' . $player->image) }}" style="width:100%" class="mx-auto d-block">
  </div>
  <div class="col">
    <label for="active">Active</label>
    <select class="form-control" name="active">
      @if ($player->active == 'true')
        <option value="true" selected>Active</option>
        <option value="false">Inactive</option>
      @else
        <option value="false" selected>Inactive</option>
        <option value="true">Active</option>
      @endif
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
            <input value="{{ $player->steam }}" class="form-control" type="text" name="steam">
          </div>
          <div class="col">
            <label for="date">Twitter:</label>
            <input value="{{ $player->twitter }}" class="form-control" type="text" name="twitter">
          </div>
          <div class="col">
            <label for="date">Youtube:</label>
            <input value="{{ $player->youtube }}" class="form-control" type="text" name="youtube">
          </div>
        </div>
        <div class="row" style="margin-bottom:2rem">
          <div class="col">
            <label for="date">Twitch:</label>
            <input value="{{ $player->twitch }}" class="form-control" type="text" name="twitch">
          </div>
          <div class="col">
            <label for="date">Instagram:</label>
            <input value="{{ $player->instagram }}" class="form-control" type="text" name="instagram">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="body">About Player</label>
            <textarea name="body"class="form-control">{{ $player->body }}</textarea>
          </div>
        </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
