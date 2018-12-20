@extends('layouts.default')

@section('title', $tourn->name)

@section('content')
<div class="tournament">
<div class="tournamentInfo">

<div class="general">
  <h1>{{ $tourn->name }}</h1>
  <h2>{{ $tourn->game }}</h2>
</div>
<div class="additional">
  <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
  <h2>{{ $tourn->format }}</h2>
</div>
  <img src="{{ asset('/images/' . $tourn->image) }}" alt="">

@if ($tourn->link != '')
  <div class="buttonContainer">
    <a target="_blank" href="{{ $tourn->link }}"><h1 class="button">Link to tournament</h1></a>
  </div>
@endif

@if ($tourn->placement != '')
  <div class="tournamentPlacement">

    <h2>Placement: {{ $tourn->placement }}</h2>

  </div>
@else
  <div class="tournamentPlacement">

    <h2>Not finished</h2>

  </div>
@endif

</div>

<div class="matches">
    @php
      $matchCount = 0;
    @endphp
    <div class="match">
    @foreach ($tourn->match as $match)
      @php
        $matchCount ++;
      @endphp
      <div class="matchCard">
        <h2>Match {{ $match->match_num }}</h2>
              <div class="match_body">
                  <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
                    <h2></h2>
                    <div style="margin: auto">
                      <h6>{{ date('d M Y', strtotime($match->date)) }}</h6>
                      <h3>VS</h3>
                      @if ($role == 'Admin')
                          <a href=" {{ url('admin/tourn-match/' . $match->id . '/edit') }} " style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">Edit</h3></a>
                      @else
                        @if ($match->link == '')
                        @else
                          <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">View</h3></a>
                        @endif

                      @endif
                    </div>
                    <h2></h2>
                    @if ($match->enemyLogo != '')
                      <img src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                    @else
                      <img src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                    @endif
              </div>
      </div>
    @endforeach
  </div>
</div>

  <div class="media">
    <h1>Livestreams</h1>

    <iframe
        src="https://player.twitch.tv/?channel=&muted=true"
        height="360"
        width="640"
        frameborder="0"
        scrolling="no"
        allowfullscreen="true">
    </iframe>
  </div>

</div>

<style media="screen">

body {
  background-color: #232323
}

.media {
  display: grid;
  padding: 1rem 15%;
  text-align: center;
}

iframe {
  margin: auto;
}

.tournamentInfo {
  display: grid;
  padding: 1rem 17.5% 0 17.5%;
  grid-template-columns: 2fr 2fr 1fr;
  grid-gap: 1rem;
  grid-template-rows: 15rem;
  font-family: Lato
}

.general {
  grid-column: 1 / 2;
  margin: auto 0;
}

.additional {
  grid-column: 2 / 3;
  margin: auto 0;
  text-align: right;
}

.tournamentInfo img {
  height: 50%;
  margin: auto 0 auto auto;
}

.buttonContainer, .tournamentPlacement {
  grid-column: 1 / 4;
  text-align: center;
}

.tournamentPlacement {
  background-color: #2B63AF
}

.buttonContainer a {
  text-decoration: none;
}

.button {
  border: 2px solid #F8B52A;
  padding: .2rem .4rem;
  background: #ffffff00;
  -webkit-transition: background ease-in-out 150ms;
  text-align: center;
  color: #FFF;
  width: 50%;
  margin: auto;
}

.button:hover {
  background: #F8B52A;
  color: #FFF;
  -webkit-transition: background ease-in-out 150ms;
}

.matches {
  padding: 1rem 15%;
  font-family: Lato;
  background-color: #F8B52A;
  background-image: none;
}

.match {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-gap: 1rem;
  width: 70%
}

.match_body {
  width: 100%;
  background-color: #2B63AF;
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  height: 5rem;
  grid-template-rows: 5rem;
  text-align: center;
  margin-bottom: .5rem
}

.match_body h1 {
  grid-column: 1 / 6;
  font-size: 1rem
}

.match_body img {
  height: 80%;
  width: auto;
  margin: auto;
}

.match_body h2, .match_body h3, .match_body h6 {
  margin: auto;
}

.match_body h4 {
  margin-bottom: .5rem;
  font-size: 1.1rem
}

@media screen and (max-width: 650px) {

  .tournamentInfo {
    padding: 1rem 5% 0 5%;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto;
    text-align: left;
  }

  .general {
    margin: 0;
    grid-column: 1 / 3
  }

  .additional {
    grid-column: 1 / 2;
    margin: auto 0;
    text-align: left;
    grid-row: 2 / 3
  }

  .tournamentInfo img {
    height: auto;
    width: 80%;
    margin: auto;
    grid-column: 2 / 3;
    grid-row: 2 / 3
  }

  .buttonContainer, .tournamentPlacement {
    grid-column: 1 / 3;
    text-align: center;
  }

  .button {
    font-size: 1.5rem
  }

  .matches {
    width: 90%;
    padding: 1rem 5%;
    font-family: Lato;
    background-color: #F8B52A;
    background-image: none
  }

  .match {
    width: 100%;
    grid-template-columns: 1fr;

  }

  iframe {
    width: auto;
    height: auto
  }

  .media {
    padding: 1rem 5%;
  }

}

</style>
@endsection
