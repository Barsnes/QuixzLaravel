@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/matches/create">Add match</a>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
      <h2 class="col-md-12">Upcoming</h2>
        @foreach ($matches->reverse() as $match)
          @if ($match->quixzScore == '0' && $match->enemyScore == '0')
            <div class="card " style="width: 20rem;">
              <div class="card-body">
                <h5 class="card-title">{{ $match->title }}</h5>
                <h5 class="card-title">{{ date('d F Y', strtotime($match->date)) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $match->team->name }}</h6>
                <h6 style="color: #FF5511" class="card-subtitle mb-2">{{ $match->tournament->name }}</h6>
                <h5>Enemy: {{ $match->enemy }}</h5>
                <a href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
              </div>
            </div>
          @endif
        @endforeach
    </div>
    <div class="row offset-2" style="margin-top:2rem;">
      <h2 class="col-md-12">Finished</h2>
        @foreach ($matches as $match)
          @if ($match->quixzScore != '0' || $match->enemyScore != '0')
            <div class="card " style="width: 20rem;">
              <div class="card-body">
                <h5 class="card-title">{{ $match->title }}</h5>
                <h5 class="card-title">{{ date('d F Y', strtotime($match->date)) }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $match->team->name }}</h6>
                <h6 style="color: #FF5511" class="card-subtitle mb-2 text-muted">{{ $match->tournament->name }}</h6>
                <h5>Enemy: {{ $match->enemy }}</h5>
                <p>Score: {{ $match->quixzScore }} : {{ $match->enemyScore }}</p>
                <a href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
