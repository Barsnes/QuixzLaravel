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
  <meta itemprop="description" content="Quixz eSports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - {{ $team->name }}">
  <meta property="og:description" content="Quixz eSports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - {{ $team->name }}">
  <meta name="twitter:description" content="Quixz eSports' {{ $team->name }} team has {{ $playerCounter }} players. Click to learn more!">
  <meta name="twitter:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

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
  <div class="teamHeader" style="background-image: url({{asset('images/' . $team->image) }});">
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
            <h2>{{ $player->firstName }} <b style="color: #F8B52A">"{{ $player->playerName }}"</b> {{ $player->lastName }}</h2>
          </div>
        </a>
      @endif
    @endforeach
  </div>

@if ($team->match == '[]')

@else
  <div class="teamMatches">
    <div class="upcomingMatches">
      <h1>Upcoming Matches</h1>
      <?php $matchCount = 0; ?>
      @foreach ($team->match as $match)
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
                      @if ($match->link == '')
                      @else
                        <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">View</h3></a>
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
      @foreach ($team->match as $match)
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
                      @if ($match->link == '')
                      @else
                        <a target="_blank" href="{{ $match->link }}" style="color: #F8B52A; text-decoration: none"><h3 class="matchButton">View</h3></a>
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
@endif

@if ($team->wins == '0' && $team->loss == '0')

@else
  <div class="winRatio">

    <h1>Win/Loss Ratio</h1>

    <div class="ratioText">

      <h2>Wins <b>{{ $team->wins }} / {{ $team->loss }}</b> Losses</h2>
      <h2>Win ratio:</h2> <h2 id="ratio"></h2>

    </div>

  </div>

  <script type="text/javascript">

    var ratio = ({{ $team->wins }} / ({{ $team->loss }} + {{ $team->wins }})) * 100;

    document.getElementById("ratio").innerHTML = Math.round(ratio) + "%";

  </script>
@endif

@if ($team->body == '')

@else
  <div class="teamAbout">
    <h1>About the team</h1>
    <div class="">
        {!! $team->body !!}
    </div>
  </div>
@endif

@php $checkTourn = 0; @endphp
@foreach ($team->tournament as $tourn)
  @php
    $date_now = date("d M Y"); // this format is string comparable
    $tournDate = date('d M Y', strtotime($tourn->date));
  @endphp
  @if ($date_now < $tournDate && $tourn->finished == '0')
    @php $checkTourn ++ @endphp
  @endif
@endforeach

@if ($checkTourn != '0')
  <div class="upcomingTournaments">
    <h1>Ongoing Tournaments</h1>
    @foreach ($team->tournament->reverse() as $tourn)
      @php
        $date_now = date("d M Y"); // this format is string comparable
        $tournDate = date('d M Y', strtotime($tourn->date));
      @endphp
      @if ($date_now < $tournDate  && $tourn->finished == '0')
          <a class="tournamentBody" href="/tournaments/{{ $tourn->slug }}">
            <img src="{{ asset('images/' . $tourn->image) }}" alt="">
            <div class="tournamentInfoLeft">
              <h2>{{ $tourn->name }}</h2>
              <h3>{{ $tourn->team->name }}</h3>
            </div>
            <div class="tournamentInfoRight">
              <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
              <h3>Not Finished</h3>
            </div>
          </a>
      @endif
    @endforeach
  </div>
@endif

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
          <h1>{{ $article->title }}</h1>
          <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
          <p class="news__desc">{!! strip_tags(substr($article->body, 0, 60)) !!}...</p>
          <p>Read more...</p>
          <hr>
        </a>
      @endif
    @endforeach
  </div>
</div>
@endif
@endsection
