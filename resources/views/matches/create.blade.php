@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Create New Match</h1>
    <hr>
    {!! Form::open(['route' => 'matches.store', 'files' => true]) !!}
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', '', array('class' => 'form-control')) }}

<div class="row">
  <div class="col">
    {{ Form::label('link', 'Link:') }}
    {{ Form::text('link', '', array('class' => 'form-control')) }}
  </div>
  <div class="col">
    <label for="tournament_id">Tournament:</label>
    <select name="ournament_id" class="form-control">
      <option value="">Choose One</option>
      @php
        $tournCount = 0;
      @endphp
      @foreach ($tournaments as $tourn)
      @php
        $date_now = date("d M Y"); // this format is string comparable
        $tournDate = date('d M Y', strtotime($tourn->date));
      @endphp
        @if ($date_now < $tournDate && $tournCount < 3)
          @php
            $tournCount ++;
          @endphp
            <option value="{{ $tourn->id }}">{{ $tourn->name }}</option>
        @endif
      @endforeach
    </select>
  </div>
</div>

      <label for="team_id">Game:</label>
      <select name="team_id" class="form-control">
        <option value="">Choose One</option>
        @foreach ($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
      </select>

      <div class="row">
<div class="col">
        <label for="date">Date:</label>
        <input class="form-control" type="date" name="date">
</div>
<div class="col">
        <label for="date">Time:</label>
        <input class="form-control" type="time" name="time">
</div>
      </div>

      <div class="row">
<div class="col">
        <label for="enemy">Enemy:</label>
        <input class="form-control" type="text" name="enemy">
</div>
<div class="col">
  {{ Form::label('enemyLogo', 'Enemy Logo:') }}
  {{ Form::file('enemyLogo', array('class' => 'form-control')) }}
</div>
      </div>

      <div class="row" style="margin: 2rem 0 2rem 0; background-color: rgb(248, 181, 42); padding: 1rem 0 2rem 0; color: #fff; border-radius: 7px">

        <div class="col">
          <label for="date">Quixz Score:</label>
          <input class="form-control" type="number" min="0" value="0" name="quixzScore">
        </div>
        <div class="col">
          <label for="date">Enemy Score:</label>
          <input class="form-control" type="number" min="0" value="0" name="enemyScore">
        </div>

      </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
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
