@extends('layouts.default')
@section('title', 'Teams')

@section('content')
  <div class="teams">
    @foreach ($games as $game)
      @if ($game->active != '1')
        @continue
      @endif
      <h1 style="text-align: center">{{ $game->name }}</h1>
      @foreach ($game->team as $team)
        @if ($team->active == '1')
          <a class="team" href="/team/{{ $team->slug }}" style="background-image: url({{ asset('images/' . $team->image) }}); background-size: cover; background-position: center">
              <h4>{{ $team->name }}</h4>
              <div class="teamTint"></div>
          </a>
        @endif
      @endforeach
    @endforeach
  </div>

@endsection
