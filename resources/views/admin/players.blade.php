@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/players/create">Add player</a>
  </div>
  <div class="col-md-12">
    <h1 class="row offset-2">Active players</h1>
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($players as $player)
          @if ($player->active == 'true')
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/player/{{ $player->playerName }}">{{ $player->firstName }} "{{ $player->playerName }}" {{ $player->lastName }}</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $player->team->name }}</h6>
              <a href="/player/{{ $player->playerName }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/players/{{ $player->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </div>
          </div>
          @endif
        @endforeach
    </div>
    <h1 class="row offset-2" style="margin-top:2rem;">Inactive players</h1>
    <div class="row offset-2">
        @foreach ($players as $player)
          @if ($player->active != 'true')
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/player/{{ $player->playerName }}">{{ $player->firstName }} "{{ $player->playerName }}" {{ $player->lastName }}</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $player->team->name }}</h6>
              <a href="/player/{{ $player->playerName }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/players/{{ $player->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </div>
          </div>
          @endif
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
