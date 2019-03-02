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
    {!! Form::open(['route' => 'tournaments.store', 'files' => true]) !!}
    <div class="row">
      <div class="col">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="col">
        <label for="link">Tournament Link:</label>
        <input type="text" name="link" value="" class="form-control">
      </div>
    </div>

    <div class="row">
      <div class="col">
        <label for="team_id">Team:</label>
        <select name="team_id" class="form-control">
          <option value="">Choose One</option>
          @foreach ($teams as $team)
              <option value="{{ $team->id }}">{{ $team->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        <label for="image">Size: 300x300</em></label>
        {{ Form::file('image', array('class' => 'form-control')) }}
      </div>
      {{-- <div class="col">
        <label for="format">Format</label>
        <select class="form-control" name="format">
          <option value="">Choose One</option>
          <option value="">Best of One</option>
          <option value="">Best of Three</option>
        </select>
      </div> --}}
    </div>

    <div class="row">
      <div class="col">
            <label for="date">Date:</label>
            <input class="form-control" type="date" name="date">
      </div>
      <div class="col">
        <label for="finished">Finished:</label>
        <select class="form-control" name="finished">
          <option value="0">Not Finished</option>
          <option value="1">Finished</option>
          <option value="2">Ongoing</option>
        </select>
      </div>
    </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
