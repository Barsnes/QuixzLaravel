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
{!! Form::open(['route' => 'tourn-match.store', 'files' => true, 'id' => 'form']) !!}
<div class="row">
  <div class="col">
    <label for="match_num">Match Number:</label>
    <input class="form-control" type="number" min="0" value="0" name="match_num">
  </div>
  <div class="col">
      <label for="tournament_id">Tournament:</label>
      <select name="tournament_id" class="form-control">
        <option value="">Choose One</option>
        @foreach ($tournaments as $tournament)
          @php
            $date_now = date("d M Y"); // this format is string comparable
            $tournDate = date('d M Y', strtotime($tournament->date));
          @endphp
          @if ($date_now < $tournDate)
            <option value="{{ $tournament->id }}">{{ $tournament->name }}</option>
          @endif
        @endforeach
      </select>
  </div>
</div>

      <div class="row">
<div class="col">
        <label for="date">Date:</label>
        <input class="form-control" type="date" name="date" value="">
</div>
<div class="col">
        <label for="date">Time:</label>
        <input class="form-control" type="time" name="time" value="">
</div>
      </div>

      <div class="row">
<div class="col">
        <label for="enemy">Enemy:</label>
        <input class="form-control" type="text" name="enemy" value="">
</div>
<div class="col">
  {{ Form::label('enemyLogo', 'Enemy Logo:') }}
  {{ Form::file('enemyLogo', array('class' => 'form-control')) }}
</div>
      </div>

      <div class="row" style="margin: 2rem 0 2rem 0; background-color: rgb(248, 181, 42); padding: 1rem 0 2rem 0; color: #fff; border-radius: 7px">

        <div class="col">
          <label for="quixzScore">Quixz Score:</label>
          <input class="form-control" type="number" min="0" value="0" name="quixzScore">
        </div>
        <div class="col">
          <label for="enemyScore">Enemy Score:</label>
          <input class="form-control" type="number" min="0" value="0" name="enemyScore">
        </div>

      </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
