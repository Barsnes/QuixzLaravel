@extends('layouts.default')

@section('title', 'Join Club')

@section('content')
<div class="club">

  <h1>Club Form</h1>

  <div class="clubForm">
    {!! Form::open(['route' => 'club.store']) !!}
    <div class="top">
      <div class="">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name">
      </div>

      <div class="">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name">
      </div>
    </div>
    <div class="bottom">
      <div class="">
        <label for="player_name">Player Name</label>
        <input type="text" name="player_name">
      </div>

      <div class="">
        <label for="email">Email</label>
        <input type="email" name="email">
      </div>
    </div>

    <div class="formButton">
      {{ Form::submit('Publish', array('class' => 'submitButton')) }}
    {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
