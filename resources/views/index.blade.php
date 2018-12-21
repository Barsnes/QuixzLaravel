@extends('layouts.default')
@section('title', 'Home')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta itemprop="description" content="{{ $index->aboutContent }}">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle-png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta property="og:description" content="{{ $index->aboutContent }}">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle-png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta name="twitter:description" content="{{ $index->aboutContent }}">
  <meta name="twitter:image" content="{{ asset('/assets/image/about/about_middle-png') }}">

  <!-- Google Strucutred Data -->
  <script type="application/ld+json">
   { "@context": "http://schema.org",
   "@type": "Organization",
   "name": "Quixz eSports",
   "legalName" : "Quixz eSports",
   "url": "https://quixz.eu",
   "logo": "https://quixz.eu/assets/image/logo/logo_2000.png",
   "foundingDate": "2015",
   "founders": [
   {
   "@type": "Person",
   "name": "Tobias Barsnes",
   "name": "Tim Strutzberg"
   }],
   "contactPoint": {
   "@type": "ContactPoint",
   "contactType": "customer support",
   "email": "contact@quixz.eu",
   "telephone": "+47 913 65 195"
   },
   "sameAs": [
   "https://twitter.com/QuixzeSports",
   "https://www.facebook.com/quixzesports",
   "https://www.gamer.no/klubber/quixz-esports/43274/lag/43275",
   "https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw"
   ]}
  </script>

@endsection

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
        <p>{{ $index->aboutContent }}</p>
      </div>
  </div>

  <div class="news__section" id="news">
    <h1>Recent News</h1>@if ($role == 'Admin')
      <div class="">
        <h1><a style="text-decoration:none;color:#2B63AF" href="/admin/news/create">Create new article</a></h1>
      </div>
    @endif
    <div class="news">
      <?php $articleCount = 0 ?>
      @foreach ($articles as $article)
      <?php $articleCount++ ?>
      @if ($articleCount <= 2)

      <div class="article_list">

        <a href=" {{ url('/news', $article->slug) }} "><img src="{{ asset('/images/' . $article->image) }}" alt="some dummy text" og:image></a>
        <h1><a href=" {{ url('/news', $article->slug) }} ">{{ $article->title }}</a></h1>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <p class="news__desc">{!! strip_tags(substr($article->body, 0, 60)) !!}...</p>
        <a href=" {{ url('/news', $article->slug) }} " class="article_readmore" style="color: #2B63AF"><p>Read more...</p></a>
        @if ($role == 'Admin')
          <div class="">
            <h1 style="text-align:right"><a style="color:#2B63AF" href=" {{ url('admin/news/' . $article->id . '/edit') }} ">Edit</a></h1>
          </div>
        @endif
        <hr>
              </div>
        @endif
      @endforeach
    </div>
  </div>

  <div class="teams">

    <h1>Our Teams</h1>

@foreach ($teams as $team)
  @if ($team->active == '1')
    <a class="team" href="/team/{{ $team->slug }}" style="background-image: url({{ asset('images/' . $team->image) }}); background-size: cover; background-position: center">
        <h1>{{ $team->name }}</h1>
    </a>
  @endif
@endforeach

  </div>

  <div class="teamMatches">

    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
      <?php $matchCount = 0; ?>
      @foreach ($matches as $match)
        <?php  $date_now = date("d M Y"); // this format is string comparable
            $matchDate = date('d M Y', strtotime($match->date));
        ?>
        @if ($date_now < $matchDate && $matchCount < 3)
          <?php $matchCount ++ ?>
            <div class="match_body">
                <h1>{{ date('d M Y', strtotime($match->date)) }}</h1>
                <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
                  <h2></h2>
                  <div style="margin: auto">
                    <h3>VS</h3>
                    <h6>{{ $match->team->name }}</h6>
                    @if ($role == 'Admin')
                        <a href=" {{ url('admin/matches/' . $match->id . '/edit') }} " style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">Edit</h3></a>
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
            @endif
      @endforeach
    </div>

    <div class="recentMatches">
      <h1>Recent Matches</h1>
      <?php $matchCount = 0; ?>
      @foreach ($matchesReverse as $match)
        <?php  $date_now = date("d M Y"); // this format is string comparable
            $matchDate = date('d M Y', strtotime($match->date));
        ?>
            @if ($date_now > $matchDate && $matchCount < 3)
              <?php $matchCount ++ ?>
            <div class="match_body">
                <h1>{{ date('d M Y', strtotime($match->date)) }}</h1>
                <img src="../assets/image/logo/logo_500.png" alt="Quixz eSports logo">
                  <h2>{{ $match->quixzScore }}</h2>
                  <div style="margin: auto">
                    <h3>VS</h3>
                    <h6>{{ $match->team->name }}</h6>
                    @if ($role == 'Admin')
                        <a href=" {{ url('admin/matches/' . $match->id . '/edit') }} " style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">Edit</h3></a>
                    @else
                      @if ($match->link == '')
                      @else
                        <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">View</h3></a>
                      @endif

                    @endif
                  </div>
                  <h2>{{ $match->enemyScore }}</h2>
                  @if ($match->enemyLogo != '')
                    <img src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                  @else
                    <img src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                  @endif
            </div>
            @endif
      @endforeach
    </div>

  </div>

  <div class="upcomingTournaments">

    <h1>Tournaments</h1>
    <h2>Upcoming</h2>
    @php $tournCount = 0; @endphp
    @foreach ($tournaments as $tourn)
      @php
        $date_now = date("d M Y"); // this format is string comparable
        $tournDate = date('d M Y', strtotime($tourn->date));
      @endphp
      @if ($date_now < $tournDate && $tournCount < 2)
        @php $tournCount ++ @endphp
        <div class="tournamentBody">
          <h1>{{ $tourn->name }}</h1>
            <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
              <div style="margin: auto">
                <h3>{{ $tourn->team->name }}</h3>
                  <a href="/tournaments/{{ $tourn->slug }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">View</h3></a>
                  @if ($role == 'Admin')
                    <a href="/admin/tournaments/{{ $tourn->id }}/edit" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">Edit</h3></a>
                  @endif
              </div>
        </div>
      @endif
      @if ($tournCount == 0)
        @php $tournCount ++ @endphp
        <h4>No upcoming tournaments</h4>
      @endif
    @endforeach

  <h2>Past</h2>
  @php $tournCount = 0; @endphp
  @foreach ($tournaments as $tourn)
    @php
      $date_now = date("d M Y"); // this format is string comparable
      $tournDate = date('d M Y', strtotime($tourn->date));
    @endphp
    @if ($date_now > $tournDate && $tournCount < 2)
      @php $tournCount ++ @endphp
      <div class="tournamentBody">
        <h1>{{ $tourn->name }}</h1>
          <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
            <div style="margin: auto">
              <h3>{{ $tourn->team->name }}</h3>
                <a href="/tournaments/{{ $tourn->slug }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">View</h3></a>
                @if ($role == 'Admin')
                  <a href="/admin/tournaments/{{ $tourn->id }}/edit" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton" style="width: 40%; margin: auto">Edit</h3></a>
                @endif
            </div>
      </div>
    @endif
  @endforeach
  @if ($tournCount == 0)
    @php $tournCount ++ @endphp
    <h4>No past tournaments</h4>
  @endif
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
