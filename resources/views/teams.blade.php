@extends('layouts.default')
@section('title', 'Teams')

@section('content')
  <div class="teams page" style="min-height: 650px;">
    @foreach ($games as $game)
      @if ($game->active != '1')
        @continue
      @endif
      @foreach ($game->team as $team)
        @if ($team->active == '1')
          <a class="team" href="/team/{{ $team->slug }}">
              <h3>{{ $team->name }}</h3>
          </a>
        @endif
      @endforeach
    @endforeach
  </div>

@endsection
