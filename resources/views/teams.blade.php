@extends('layouts.default')
@section('title', 'Teams')

@section('content')
  <div class="teams">

  @foreach ($teams as $team)
    <a class="team" href="/team/{{ $team->slug }}" style="background-image: url({{ asset('images/' . $team->image) }}); background-size: cover; background-position: center">

        <h1>{{ $team->name }}</h1>

    </a>
  @endforeach

  </div>

  <style>

  body {
    background-color: #2B63AF
  }

  .teams {
    min-height: 100vh;
    display: grid;
    padding: 2rem 15%;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 15rem 15rem;
    text-align: center;
  }

  .team {
    width: 100%;
    background-color: #2B63AF;
    color: #FFF;
    text-decoration: none;
    grid-column: span 1;
    width: 100%;
    display: grid;
    align-content: center;
  }

  .team h4 {
    margin: auto;
    font-size: 70%
  }

  @media screen and (max-width: 650px) {
    .teams {
      min-height: 100vh;
      display: grid;
      padding: 2rem 15%;
      grid-template-columns: 1fr;
      grid-template-rows: auto;
      text-align: center;
    }
  }
  </style>


@endsection
