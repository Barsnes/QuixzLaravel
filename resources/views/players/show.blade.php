@extends('layouts.default')
@section('title'){{ $player->playerName }}@endsection

@section('seo')
  <link rel="stylesheet" href="{{ asset('css/flags.css') }}">

  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - {{ $player->playerName }}">
  <meta itemprop="description" content="{{ $player->firstName }} '{{ $player->playerName }}' {{ $player->lastName }}, is a player for Quixz Esports' {{ $player->team->name }} team! Click if you want to learn more about {{ $player->firstName }}">
  <meta itemprop="image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - {{ $player->playerName }}">
  <meta property="og:description" content="{{ $player->firstName }} '{{ $player->playerName }}' {{ $player->lastName }}, is a player for Quixz Esports' {{ $player->team->name }} team! Click if you want to learn more about {{ $player->firstName }}">
  <meta property="og:image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - {{ $player->playerName }}">
  <meta name="twitter:description" content="{{ $player->firstName }} '{{ $player->playerName }}' {{ $player->lastName }}, is a player for Quixz Esports' {{ $player->team->name }} team! Click if you want to learn more about {{ $player->firstName }}">
  <meta name="twitter:image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Google Strucutred Data -->
  <script type="application/ld+json">
   { "@context": "http://schema.org",
   "@type": "Organization",
   "name": "Quixz Esports",
   "legalName" : "Quixz Esports",
   "url": "https://quixz.eu",
   "logo": "https://quixz.eu/assets/image/logo/mascot-500.png",
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
   "https://twitter.com/QuixzEsports",
   "https://www.facebook.com/quixzesports",
   "https://www.gamer.no/klubber/quixz-esports/43274/lag/43275",
   "https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw"
   ]}
  </script>

@endsection

@section('content')

<div class="player">
  <div class="player__profile">
    <div class="player_image">
      <img loading="lazy" src="{{ asset('images/' . $player->image) }}" alt="">
    </div>

  <div class="player_info">
    <div class="player_name">
      <h1>
        @if ($player->nationality != '')
          <img loading="lazy" src="{{ asset('assets/blank.gif') }}" class="flag flag-{{ $player->nationality }}" />
        @endif
        {{ $player->firstName }} <b style="color:#FF5511">{{ $player->playerName }}</b> {{ $player->lastName }}
      </h1>
    </div>

    <div class="player_game">
      <p>
        Team: <a href="/team/{{ $player->team->slug }}">{{ $player->team->name }}</a>
      </p>
      @if ($player->role != '')
        <p>Role: {{ $player->role }}</p>
      @endif
    </div>

  <div class="social-media">
    @if ($player->twitch != NULL)
      <a href="{{ $player->twitch }}" target="_blank"><i class="fab fa-twitch"></i></a>
    @endif

    @if ($player->twitter != NULL)
      <a href="{{ $player->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
    @endif

    @if ($player->youtube != NULL)
      <a href="{{ $player->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
    @endif

    @if ($player->steam != NULL)
      <a href="{{ $player->steam }}" target="_blank"><i class="fab fa-steam"></i></a>
    @endif

    @if ($player->instagram != NULL)
      <a href="{{ $player->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
    @endif
  </div>
</div>
</div>

@if ($player->body != '')
  <div class="player__text">
    <h1 class="title">About {{ $player->playerName }}</h1>

    {!! $player->body !!}
  </div>
@endif

@if ($player->team->match!= '[]')
  <div class="teamMatches">
    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($player->team->match->sortBy('date') as $match)
        @php
            $matchDate = new DateTime($match['date']);
            $date_now = new DateTime();
        @endphp
        @if ($match->quixzScore == '0' && $match->enemyScore == '0' && $matchCount < 3)
          @php $matchCount ++ @endphp
            <div class="match_body">
                <h1>{{ date('d M Y', strtotime($match->date)) }}    -
                    @if ($match->link == '')
                    @else
                      <a target="_blank" href="{{ $match->link }}" style="color: #FF5511; text-decoration: none">View</a>
                    @endif
                </h1>
                <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
                  <div class="matchEnemy">
                    <div class="matchEnemy__quixz">
                      <img loading="lazy" src="../assets/image/logo/mascot-500.png" alt="Quixz Esports logo">
                      <h6>{{ $match->team->name }}</h6>
                    </div>
                    <h3>VS</h3>
                    <div class="matchEnemy__info">
                      <h6>{{ $match->enemy }}</h6>
                      @if ($match->enemyLogo != '')
                        <img loading="lazy" src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                      @else
                        <img loading="lazy" src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                      @endif
                    </div>
                  </div>
            </div>
            @endif
      @endforeach
      @if ($matchCount == '0')
        @php $matchCount ++; @endphp
        <h4 style="font-family:'Paralucent'; font-weight: 300">No upcoming matches</h4>
      @endif
    </div>

    <div class="recentMatches">
      <h1>Recent Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($player->team->match->sortBy('date')->reverse() as $match)
        @php
            $matchDate = new DateTime($match['date']);
            $date_now = new DateTime();
        @endphp
            @if ($match->quixzScore != '0' || $match->enemyScore != '0')
              @if ($matchCount >= 3)
                @continue
              @endif
              @php $matchCount ++ @endphp
              <div class="match_body">
                  <h1>{{ date('d M Y', strtotime($match->date)) }}    -
                      @if ($match->link == '')
                      @else
                        <a target="_blank" href="{{ $match->link }}" style="color: #FF5511; text-decoration: none">View</a>
                      @endif
                  </h1>
                  <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
                    <div class="matchEnemy">
                      <div class="matchEnemy__quixz">
                        <img loading="lazy" src="../assets/image/logo/mascot-500.png" alt="Quixz Esports logo">
                        <h6>{{ $match->team->name }}</h6>
                      </div>
                      <div class="matchMiddle">
                        <h3>VS</h3>
                        <h2>{{ $match->quixzScore }} : {{ $match->enemyScore }}</h2>
                      </div>
                      <div class="matchEnemy__info">
                        <h6>{{ $match->enemy }}</h6>
                        @if ($match->enemyLogo != '')
                          <img loading="lazy" src=" {{ asset('/images/' . $match->enemyLogo) }} " alt="Logo of opposing team"></img>
                        @else
                          <img loading="lazy" src=" {{ asset('/images/default_team_logo.png') }} " alt="Logo of opposing team"></img>
                        @endif
                      </div>
                    </div>
              </div>
            @endif
      @endforeach
    </div>
  </div>
@endif

@if ($player->team->article != '[]')
  <div class="teamArticles">
    <h1 class="title">Related Articles</h1>
    <div class="news">
      @php
        $articleCount = 0;
      @endphp
      @foreach ($player->team->article->reverse() as $article)
        @php
          $articleCount ++;
        @endphp
        @if ($articleCount <= 2)
          <a href=" {{ url('/news', $article->slug) }} " class="article_list">
            <img loading="lazy" src="{{ asset('/images/' . $article->image) }}" alt="A description" og:image>
            <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
            <h1>{{ $article->title }}</h1>
            <hr>
          </a>
        @endif
      @endforeach
    </div>
  </div>
@endif

@if ($player->team->player->count() != '1')
  <div class="playerTeam">
    <div class="teamBody">
      <div class="title">
        <h1>Teammates</h1>
      </div>
      @php
        $currPlayer = $player->playerName;
      @endphp
      @foreach ($player->team->player as $player)
        @if ($player->active == 'true' && $player->playerName != $currPlayer)
          <a href="/player/{{ $player->playerName }}" style="text-decoration: none; color: #FFF" class="card">
            <img loading="lazy" src="{{ asset('images/' . $player->image) }}" alt="" style="width:100%">
            <div class="container">
              <h2>{{ $player->firstName }} <b style="color: #FF5511">"{{ $player->playerName }}"</b> {{ $player->lastName }}</h2>
            </div>
          </a>
        @endif
      @endforeach
    </div>
  </div>
@endif
</div>

@endsection
