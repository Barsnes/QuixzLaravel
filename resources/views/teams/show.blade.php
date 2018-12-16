@extends('layouts.default')
@section('title'){{ $team->name }}@endsection

@section('content')
  <div class="teamHeader">
  <h1>{{ $team->name }}</h1>
  </div>

  <div class="team">
    @foreach ($team->player as $player)
      @if ($player->active == 'true')
        <div class="card">
          <img src="{{ asset('images/' . $player->image) }}" alt="" style="width:100%">
          <div class="container">
            <a href="/player/{{ $player->playerName }}" style="text-decoration: none; color: #FFF"><h2>{{ $player->firstName }} <b style="color: #F8B52A">{{ $player->playerName }}</b> {{ $player->lastName }}</h2></a>
          </div>
        </div>
      @endif
    @endforeach
  </div>

  {{-- <div class="teamMatches">

    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
        <div class="match_body">
            <h1>{{ item.matchdate | date: '%B %d, %Y' }}</h1>
            <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
              <h2>{{ item.score.quixzScore }}</h2>
              <div style="margin: auto">
                <h3>VS</h3>
                <a target="_blank" href="{{ item.matchlink }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">{{ item.matchType}}</h3></a>
              </div>
              <h2>{{ item.score.opponentScore }}</h2>
            <img src="{{ item.image }}" alt="Logo of opposing team"></img>
        </div>
    </div>

    <div class="recentMatches">
      <h1>Recent Matches</h1>
        <div class="match_body">
            <h1>{{ item.matchdate | date: '%B %d, %Y' }}</h1>
            <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
              <h2>{{ item.score.quixzScore }}</h2>
              <div style="margin: auto">
                <h4>VS</h4>
                <a target="_blank" href="{{ item.matchlink }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">{{ item.matchType }}</h3></a>
              </div>
              <h2>{{ item.score.opponentScore }}</h2>
            <img src="{{ item.image }}" alt="Logo of opposing team"></img>
        </div>
    </div>

  </div> --}}

  <div class="winRatio">

    <h1>Win/Loss Ratio</h1>

    <div class="ratioText">

      <h2>Wins <b>{{ $team->wins }} / {{ $team->wins }}</b> Losses</h2>
      <h2>Win ratio:</h2> <h2 id="ratio"></h2>

    </div>

  </div>

  {{-- <div class="upcomingTournaments">

    <h1>Tournaments</h1>
    <h2>Upcoming</h2>
      <div class="tournamentBody">
        <h1>{{ item.title }}</h1>
          <h2>{{ item.matchdate | date: '%B %d, %Y' }}</h2>
            <div style="margin: auto">
              <h3>{{ item.game }}</h3>
              <a href="{{ item.url }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">{{ item.matchType }}</h3></a>
            </div>
      </div>
  </div>

  <div class="upcomingTournaments">
    <h2>Past</h2>
      <div class="tournamentBody">
        <h1>{{ item.title }}</h1>
          <h2>{{ item.matchdate | date: '%B %d, %Y' }}</h2>
            <div style="margin: auto">
              <h3>{{ item.game }}</h3>
              <a href="{{ item.url }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">{{ item.matchType }}</h3></a>
            </div>
      </div>
  </div> --}}

  <script type="text/javascript">

    var ratio = ({{ $team->wins }} / ({{ $team->loss }} + {{ $team->wins }})) * 100;

    document.getElementById("ratio").innerHTML = Math.round(ratio) + "%";

  </script>

  <div class="teamAbout">
    <h1>History</h1>
    <div class="">
        {{ $team->body }}
    </div>
  </div>

<div class="teamArticles">
  <h1>Related Articles</h1>
  <div class="news">
    @foreach ($team->article as $article)
      <div class="article_list">
        <a href=" {{ url('/news', $article->slug) }} "><img src="{{ asset('/images/' . $article->image) }}" alt="A description" og:image></a>
        <h1><a href=" {{ url('/news', $article->slug) }} ">{{ $article->title }}</a></h1>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <p class="news__desc">{!! strip_tags(substr($article->body, 0, 60)) !!}...</p>
        <a href="{{ url('/news', $article->slug) }}" class="article_readmore" style="color: #2B63AF"><p>Read more...</p></a>
        <hr>

      </div>
    @endforeach
  </div>
</div>

  <style>

  body {
    background-color: #232323;
    box-sizing: border-box;
  }

  .tournamentBody {
    text-align: center;
    width: calc(100% - 1rem);
    background-color: #2B63AF;
    margin: auto;
    padding: .5rem;
    font-family: Lato
  }

  .tournamentBody h1, .tournamentBody h2 {
    margin: .1rem auto;
  }

  .upcomingTournaments h1, .upcomingTournaments h2 {
    grid-column: 1 / 3;
    margin: 0;
  }

  .tournamentBody h1 {
    color: #F8B52A
  }

  .upcomingTournaments {
    background-color: #F8B52A;
    display: grid;
    padding: 1rem 15%;
    grid-template-columns: 1fr 1fr;
    grid-gap: 1rem;
  }

  .teamHeader {
    width: 100%;
    height: 15rem;
    text-align: center;
    background-image: url({{asset('images/' . $team->image) }});
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin: 0;
    display: grid;
  }

  .teamHeader h1 {
    margin: auto;
  }

  .team {
    width: 50%;
    padding: 0 25%;
    margin-top: 1em;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-gap: 1rem;
    margin-bottom: 2rem
  }

  .card {
    grid-column: span 1;
    width: 100%;
    padding: .2rem
  }

  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }

  .card a {
    font-size: .8rem
  }

  .teamMatches {
    display: grid;
    grid-template-columns: repeat(2, calc(50% - 1rem));
    grid-gap: 2rem;
    width: 70%;
    padding: 0 15% 0 15%;
    background-color: #F8B52A
  }

  .recentMatches, .upcomingMatches {
    width: 100%;
    grid-column: span 1
  }

  .match_body {
    width: 100%;
    background-color: #2B63AF;
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    height: 8rem;
    grid-template-rows: 2rem 5rem;
    text-align: center;
    font-family: Lato;
    margin-bottom: .5rem
  }

  .match_body h1 {
    grid-column: 1 / 6;
    font-size: 1rem
  }

  .match_body img {
    width: 80%;
    height: auto;
    margin: auto;
  }

  .match_body h2, .match_body h3, .match_body h6 {
    margin: auto;
  }

  .match_body h4 {
    margin-bottom: .5rem;
    font-size: 1.1rem
  }

  .matchButton {
    border: 2px solid #F8B52A;
    padding: .2rem .4rem;
    background: #ffffff00;
    -webkit-transition: background ease-in-out 150ms;
  }

  .matchButton:hover {
    background: #F8B52A;
    color: #FFF;
    -webkit-transition: background ease-in-out 150ms;
  }

  .winRatio {
    text-align: center;
    font-family: "Lato";
    background-color: #2B63AF;
    margin: 0;
    padding: 1rem;
  }

  .ratioText b {
    color: #F8B52A;
  }

  .match_body h2, .match_body h3 {
    margin: auto;
  }

  .teamAbout {
    width: 60%;
    font-family: Lato;
    margin: auto;
    min-height: 15rem;
  }

  .teamAbout h1 {
    text-align: center;
    font-family: Raleway
  }

  .teamGallery {
    width: 100%;
    min-height: 15rem;
    font-family: Lato;
    margin: auto;
  }

  .teamImages {
    width: 60%
  }

  .teamGallery h1 {
    text-align: center;
    font-family: Raleway;
  }

  .teamArticles {
    background-color: #F8B52A;
    text-align: center;
    padding-top: 1rem;
  }

  @media screen and (max-width: 650px) {
    .teamMatches {
      display: grid;
      grid-template-columns: 100%;
      grid-gap: .5rem;
      width: 90%;
      padding: 0 5%;
    }

    .team {
      width: 90%;
      padding: 0 5%;
      margin-top: 1em;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 1rem;
      margin-bottom: 2rem
    }

    .teamAbout, .teamImages {
      width: 90%
    }
  }

  </style>


@endsection
