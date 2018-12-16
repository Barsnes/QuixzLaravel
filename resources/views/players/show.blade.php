@extends('layouts.default')
@section('title'){{ $player->playerName }}@endsection

@section('content')

<div class="player">
  <div class="player__profile">
    <div class="player_image">
      <img src="{{ asset('images/' . $player->image) }}" alt="">
    </div>

  <div class="player_info">
    <div class="player_name">
      <h1>{{ $player->firstName }} <b style="color:#F8B52A">{{ $player->playerName }}</b> {{ $player->lastName }}</h1>
    </div>

    <div class="player_game">
      <p>{{ $player->team->name }}</p>
    </div>

  <div class="social-media">
    @if ($player->twitch == NULL)
    @else
      <a href="{{ $player->twitch }}" target="_blank"><i class="fab fa-twitch"></i></a>
    @endif

    @if ($player->twitter == NULL)
    @else
      <a href="{{ $player->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
    @endif

    @if ($player->youtube == NULL)
    @else
      <a href="{{ $player->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
    @endif

    @if ($player->steam == NULL)
    @else
      <a href="{{ $player->steam }}" target="_blank"><i class="fab fa-steam"></i></a>
    @endif

    @if ($player->instagram == NULL)
    @else
      <a href="{{ $player->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
    @endif
  </div>
</div>

@if ($role == 'Admin')
<h2><a class="matchButton" href="/admin/players/{{ $player->id }}/edit" class="btn btn-warning btn-sm">Edit</a></h2>
@endif
</div>

  <div class="player__text">
    <h1 class="title">About {{ $player->playerName }}</h1>

    {{ $player->body }}
  </div>
</div>

<style>

.matchButton {
  border: 2px solid #F8B52A;
  padding: .2rem .4rem;
  background: #ffffff00;
  -webkit-transition: background ease-in-out 150ms;
  text-decoration: none;
  color: #FFF;
}

.matchButton:hover {
  background: #F8B52A;
  color: #FFF;
  -webkit-transition: background ease-in-out 150ms;
}

.player {
  background-color: #2B63AF;
  min-height: 100vh;
  padding-top: 1rem;
  text-align: center;
  width: 100vw;
  overflow-y: scroll;
}

.player__profile {
  width: 50%;
  height: auto;
  display: grid;
  grid-gap: 1em;
  grid-template-columns: 2fr 4fr;
  grid-template-rows: auto;
  padding: 2rem 0;
  margin: 0 auto;
  text-align: left;
  margin: 1rem 25%;
  background-color: #FFFFFF20;
  box-shadow: 0 0 50px #00000020;
}

.player_info {
  grid-column: 2 / 3;
  grid-row: 1 / 2;
  width: 100%;
  height: 100%
}

.player_image img {
  width: 100%;
  height: auto;
}

.player_name {
  width: 100%
}

.social-media {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  margin: 0 auto;
  text-align: center;
  margin-top: 12%
}

.social-media a {
  color: #FFF;
  text-decoration: none;
  font-size: 2rem;
  grid-column: span 1;
}

.player__text {
  width: 50%;
  margin: 0 auto;
  text-align: left;
  font-family: "Lato"
}

.player__text .title {
  text-align: center;
  font-family: "Raleway"
}

@media screen and (max-width: 650px) {

  .player__profile {
    width: calc(100vw - 2rem);
    height: auto;
    display: grid;
    grid-gap: .5em;
    grid-template-columns: 1fr;
    grid-template-rows: repeat(2, 1fr);
    padding: 2rem 0;
    margin: 0 auto;
    text-align: left;
    margin: 1rem 1rem;
  }

  .social-media {
    width: 100%;
    text-align: center;
  }

  .player__text {
    width: 80%;
  }

  .player_info {
    grid-column: 1 / 2;
    grid-row: 2 / 2;
    padding: 1rem;
    width: calc(100% - 2rem)
  }
}
</style>

@endsection
