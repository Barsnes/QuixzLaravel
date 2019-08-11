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
    {!! Form::open(['route' => 'matches.store', 'files' => true, 'id' => 'form']) !!}
    <div class="row">
      <div class="col">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', '', array('class' => 'form-control', "required" => "true")) }}
      </div>
      <div class="col">
        <label for="">Tournaments</label>
        <select required class="form-control" name="tournament_id">
          @foreach ($tournaments as $tournament)
            @if ($tournament->finished == '1')
              @continue
            @endif
            <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

<div class="row">
  <div class="col">
    {{ Form::label('link', 'Link:') }}
    {{ Form::text('link', '', array('class' => 'form-control')) }}
  </div>
  <div class="col">

  </div>
</div>

      <div class="row">
<div class="col">
        <label for="date">Date:</label>
        <input required class="form-control" type="date" name="date">
</div>
<div class="col">
        <label for="date">Time:</label>
        <input required class="form-control" type="time" name="time">
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
