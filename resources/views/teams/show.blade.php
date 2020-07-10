@extends('layouts.default')
@section('title'){{ $team->name }}@endsection

@section('seo')
  @php
    $playerCounter = 0;
  @endphp

  @foreach ($team->player as $player)
    @php
      $playerCounter ++
    @endphp
  @endforeach
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - {{ $team->name }}">
  <meta itemprop="description" content="Quixz Esports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - {{ $team->name }}">
  <meta property="og:description" content="Quixz Esports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - {{ $team->name }}">
  <meta name="twitter:description" content="Quixz Esports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta name="twitter:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Google Strucutred Data -->
  <script type="application/ld+json">
   { "@context": "http://schema.org",
   "@type": "Organization",
   "name": "Quixz Esports",
   "legalName" : "Quixz Esports",
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
   "https://twitter.com/QuixzEsports",
   "https://www.facebook.com/quixzesports",
   "https://www.gamer.no/klubber/quixz-esports/43274/lag/43275",
   "https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw"
   ]}
  </script>

@endsection

@section('content')
  <div class="teamHeader">
  <h1>{{ $team->name }}
   </h1>
  </div>

  <div class="teamBody">
    <div class="title">
      <h1>Active Roster</h1>
    </div>
    @foreach ($team->player as $player)
      @if ($player->active == 'true')
        <a href="/player/{{ $player->playerName }}" style="text-decoration: none; color: #FFF" class="card">
          <img src="{{ asset('images/' . $player->image) }}" alt="" style="width:100%">
          <div class="container">
            <h2>{{ $player->firstName }} <b style="color: #f9b633">"{{ $player->playerName }}"</b> {{ $player->lastName }}</h2>
          </div>
        </a>
      @endif
    @endforeach
  </div>

@if ($team->match != '[]')
  <div class="teamMatches">
    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($team->match->sortBy('date') as $match)
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
                      <a target="_blank" href="{{ $match->link }}" style="color: #f9b633; text-decoration: none">View</a>
                    @endif
                </h1>
                <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
                  <div class="matchEnemy">
                    <div class="matchEnemy__quixz">
                      <img src="../assets/image/logo/mascot-500.png" alt="Quixz Esports logo">
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
      @if ($matchCount == '0')
        @php $matchCount ++; @endphp
        <h4 style="font-family:'Paralucent'; font-weight: 300">No upcoming matches</h4>
      @endif
    </div>

    <div class="recentMatches">
      <h1>Recent Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($team->match->sortBy('date')->reverse() as $match)
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
                        <a target="_blank" href="{{ $match->link }}" style="color: #f9b633; text-decoration: none">View</a>
                      @endif
                  </h1>
                  <a href="/tournaments/{{ $match->tournament->slug }}">{{ $match->tournament->name }}</a>
                    <div class="matchEnemy">
                      <div class="matchEnemy__quixz">
                        <img src="../assets/image/logo/mascot-500.png" alt="Quixz Esports logo">
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
  </div>
@endif

@php $checkTourn = 0; @endphp
@foreach ($team->tournament as $tourn)
  @php
    $date_now = date("d M Y"); // this format is string comparable
    $tournDate = date('d M Y', strtotime($tourn->date));
  @endphp
  @if ($tourn->finished == '2')
    @php $checkTourn ++ @endphp
  @endif
@endforeach

@if ($team->article == '[]')

@else

<div class="teamArticles">
  <h1 class="title">Related Articles</h1>
  <div class="news">
    @php
      $articleCount = 0;
    @endphp
    @foreach ($team->article->reverse() as $article)
      @php
        $articleCount ++;
      @endphp
      @if ($articleCount <= 2)
        <a href=" {{ url('/news', $article->slug) }} " class="article_list">
          <img src="{{ asset('/images/' . $article->image) }}" alt="A description" og:image>
          <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
          <h1>{{ $article->title }}</h1>
          <hr />
        </a>
      @endif
    @endforeach
  </div>
</div>
@endif
@endsection
