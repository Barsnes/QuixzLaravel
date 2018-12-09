@extends('layouts.default')
@section('title', 'Home')

@section('content')

  <div class="background_top">
    <h1>Quixz<span>eSports</span></h1>
  </div>

  <div class="arrow">
    <a class="fas fa-angle-down arrow_button" href="#about"></a>
  </div>

  </div>

  <div class="about" id="about">
      <img src="assets/image/logo/logo_500.png" alt="Quixz eSports logo">
      <div class="about_text">
        <h1>About Us</h1>
        <p>Quixz eSports is an organization located in Europe. We started as a group of
        friends in 2014, and have grown bigger with time. Our goal is to make the
        esports scene better for everyone, and that players can have someone to have
        their back. Currently we are looking for teams and players in various games,
        and hope to grow big. We live in a time when the community is growing
        everyday, and we hope to help the growth.</p>
      </div>
  </div>

  <div class="news__section" id="news">
    <h1>Recent News</h1>
    <div class="news">
      <?php $articleCount = 0 ?>
      @foreach ($articles as $article)
      <?php $articleCount++ ?>
      @if ($articleCount <= 2)

      <div class="article_list">

        <a href=" {{ url('/news', $article->slug) }} "><img src="{{ $article->image }}" alt="some dummy text" og:image></a>
        <h1><a href=" {{ url('/news', $article->slug) }} ">{{ $article->title }}</a></h1>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <p class="news__desc">{{ substr($article->body, 0, 60) }}...</p>
        <a href=" {{ url('/news', $article->slug) }} " class="article_readmore" style="color: #2B63AF"><p>Read more...</p></a>
        <hr>
        @if ($role == 'Admin')
          <div class="">
            <h1><a href=" {{ url('admin/news/' . $article->id . '/edit') }} ">Edit</a></h1>
          </div>
        @endif
              </div>
        @endif
      @endforeach
    </div>
  </div>

  <div class="teams">

    <h1>Our Teams</h1>


  <a class="team" href="/" style="background-image: url(https://unsplash.it/300); background-size: cover; background-position: center">

      <h1>Counter Strike</h1>

  </a>

  </div>

  <div class="teamMatches">

    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
        <div class="match_body">
            <h1>2 January 2020</h1>
            <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
              <h2></h2>
              <div style="margin: auto">
                <h3>VS</h3>
                <h6>CSGO</h6>
                <a target="_blank" href="/" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">#</h3></a>
              </div>
              <h2></h2>
            <img src="https://unsplash.it/500" alt="Logo of opposing team"></img>
        </div>
    </div>

    <div class="recentMatches">
      <h1>Recent Matches</h1>
        <div class="match_body">
            <h1>1 January 2019</h1>
            <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
              <h2>16</h2>
              <div style="margin: auto">
                <h3>VS</h3>
                <h6>Rocket League</h6>
                <a target="_blank" href="/" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">Overwatch</h3></a>
              </div>
              <h2>0</h2>
            <img src="https://unsplash.it/500" alt="Logo of opposing team"></img>
        </div>
    </div>

  </div>

  <div class="upcomingTournaments">

    <h1>Tournaments</h1>
    <h2>Upcoming</h2>
      <div class="tournamentBody">
        <h1>Tournament</h1>
          <h2>24 December 2018</h2>
            <div style="margin: auto">
              <h3>Hearthstone</h3>
              <a href="/" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">Match</h3></a>
            </div>
      </div>

  <h2>Past</h2>
      <div class="tournamentBody">
        <h1>Tournament</h1>
          <h2>23 December 2018</h2>
            <div style="margin: auto">
              <h3>Counter Strike</h3>
              <a href="/" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">Tournament</h3></a>
            </div>
      </div>
  </div>

  <style>

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

  .teamMatches {
    display: grid;
    grid-template-columns: repeat(2, calc(50% - 1rem));
    grid-gap: 2rem;
    width: 70%;
    padding: 2rem 15% 3rem 15%;
    background-image: url(/assets/image/backgrounds/matches.png);
    background-size: cover;
    background-position: center
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

  .match_body a {
    margin-top: 1rem
  }

  .match_body h6 {
    margin-bottom: .5rem;
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

  .teams {
    background-color: #2B63AF;
    display: grid;
    padding: 0 15% 2rem 15%;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 5rem 5rem 5rem;
    grid-gap: .5rem;
    text-align: center;
  }

  .teams h1 {
    grid-column: 1 / 4;
    font-size: 2rem;
  }

  .team {
    width: 100%;
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
      grid-template-rows: 5rem auto;
      text-align: center;
    }

    .teams h1 {
      grid-column: 1 / 2
    }

    .teamMatches {
      display: grid;
      grid-template-columns: 100%;
      grid-gap: .5rem;
      width: 90%;
      padding: 0 5%;
    }

    .upcomingTournaments h1, .upcomingTournaments h2 {
      grid-column: 1 / 2;
    }

    .upcomingTournaments {
      grid-template-columns: 1fr;
    }
  }

  </style>

  <!-- Netlify CMS redirect to /admin -->

  <script>
    if (window.netlifyIdentity) {
      window.netlifyIdentity.on("init", user => {
        if (!user) {
          window.netlifyIdentity.on("login", () => {
            document.location.href = "/admin/";
          });
        }
      });
    }
  </script>

  </body>

  </html>


@endsection
