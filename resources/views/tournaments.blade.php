@extends('layouts.default')

@section('title', $tourn->name)

@section('content')
<div class="tournament">
<div class="tournamentInfo">
  <div class="general">
    <h1>{{ $tourn->name }}</h1>
    <h2>{{ $tourn->team->name }}</h2>
  </div>
  <div class="additional">
    <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
  </div>
  @if ($tourn->image != '')
    <img src="{{ asset('/images/' . $tourn->image) }}" alt="Tournament image">
  @else
    <img src=" {{ asset('/images/default_team_logo.png') }} " alt="Tournament image"></img>
  @endif

  @if ($tourn->link != '')
    <div class="buttonContainer">
      <a target="_blank" href="{{ $tourn->link }}"><h1 class="button">Link to tournament</h1></a>
    </div>
  @endif

  <div class="tournamentPlacement">
    <h2>{{ $tourn->getFinished() }}</h2>
  </div>
</div>

<div class="teamMatches" style="background-color: #F8B52A">
    <h2 style="grid-column: 1 / 3;">Upcoming</h2>
    @foreach ($tourn->match->sortBy('date') as $match)
      @if ($match->quixzScore == '0' && $match->enemyScore == '0')
        <div class="match_body">
            <h1>{{ date('d M Y', strtotime($match->date)) }}    -
                @if ($match->link == '')
                @else
                  <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none">View</a>
                @endif
            </h1>
            <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
              <div class="matchEnemy">
                <div class="matchEnemy__quixz">
                  <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
                  <h6>{{ $match->team->name }}</h6>
                </div>
                <h3>VS</h3>
                <div class="matchEnemy__info">
                  <h6>{{ $match->enemy }}</h6>
                  @if ($match->enemyLogo != '')
                    <img src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                  @else
                    <img src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                  @endif
                </div>
              </div>
        </div>
      @endif
    @endforeach
  <h2 style="grid-column: 1 / 3;">Finished</h2>
  @foreach ($tourn->match->sortBy('date')->reverse() as $match)
    @if ($match->quixzScore != '0' || $match->enemyScore != '0')
      <div class="match_body">
          <h1>{{ date('d M Y', strtotime($match->date)) }}    -
              @if ($match->link == '')
              @else
                <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none">View</a>
              @endif
          </h1>
          <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
            <div class="matchEnemy">
              <div class="matchEnemy__quixz">
                <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
                <h6>{{ $match->team->name }}</h6>
              </div>
              <div class="matchMiddle">
                <h3>VS</h3>
                <h2>{{ $match->quixzScore }} : {{ $match->enemyScore }}</h2>
              </div>
              <div class="matchEnemy__info">
                <h6>{{ $match->enemy }}</h6>
                @if ($match->enemyLogo != '')
                  <img src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                @else
                  <img src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                @endif
              </div>
            </div>
      </div>
    @endif
  @endforeach
</div>

@if ($tourn->stream != '')
  <div class="media">
    <h1>Livestreams</h1>
    <iframe
        src="https://player.twitch.tv/?channel={{ $tourn->stream }}&muted=true"
        height="360"
        width="640"
        frameborder="0"
        scrolling="no"
        allowfullscreen="true">
    </iframe>
  </div>
@endif


</div>

@endsection
