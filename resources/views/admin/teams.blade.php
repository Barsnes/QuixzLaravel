@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/teams/create">Add team</a>
  </div>
  <div class="col-md-12">
    <h1 class="row offset-2">Teams</h1>
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($teams as $team)
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/team/{{ $team->name }}">{{ $team->name }}</a></h5>
              <hr style="border: .3px solid #FFF">
              <h6 class="card-subtitle mb-2">Players:</h6>
              @foreach ($team->player as $player)
                @if ($player->active == 'true')
                  <h6 class="card-subtitle mb-2 text-muted">{{ $player->playerName }}</h6>
                @endif
              @endforeach
              <a href="/team/{{ $team->id }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/team/{{ $team->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
