@extends('layouts.default')
@section('title', 'Home')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta itemprop="description" content="{{ $index->aboutContent }}">
  <meta name="description">{{ $index->aboutContent }}</meta>
  <meta itemprop="image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta property="og:description" content="{{ $index->aboutContent }}">
  <meta property="og:image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta name="twitter:description" content="{{ $index->aboutContent }}">
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
   "name": "Tobias Barsnes"
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
   "https://twitch.tv/quixzesports",
   "https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw"
   ]}
  </script>

  <!-- Load the Twitch embed script -->
  <script src="https://embed.twitch.tv/embed/v1.js"></script>

@endsection

@section('content')

  <div class="background_top">
    <h1>Quixz<span>Esports</span></h1>

    <div class="sponsors-top">
      @foreach ($sponsors as $sponsor)
        @if ($sponsor->active != 0)
          <a target="_blank" href="{{ $sponsor->website }}"><img src="{{ asset('images/' . $sponsor->image) }}" alt="{{ $sponsor->name }}"></a>
        @endif
      @endforeach
    </div>

  </div>

  <div class="news__section" id="news">
    <h1 class="news__section--header_text">Recent News</h1>
    <div class="news">
      @php $articleCount = 0 @endphp
      @foreach ($articles as $article)
      @php $articleCount++ @endphp
      @if ($articleCount <= 2)
      <a class="article_list" href=" {{ url('/news', $article->slug) }}">
        <img loading="lazy" src="{{ asset('/images/' . $article->image) }}" alt="{{ $article->title }} image" og:image>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <h1>{{ $article->title }}</h1>
        <hr>
      </a>
        @endif
      @endforeach
    </div>
  </div>

  <div class="teamMatches">
    <div class="upcomingMatches">
      <h1 class="upcomingMatches--header_text">Upcoming Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($matches->sortBy('date') as $match)
        @php
            $matchDate = new DateTime($match['date']);
            $date_now = new DateTime();
        @endphp
        @if ($match->team->active != '0' && $match->quixzScore == '0' && $match->enemyScore == '0' && $matchCount < 3)
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
        <h4 style="font-family:'Lato'">No upcoming matches</h4>
      @endif
    </div>

    <div class="recentMatches">
      <h1 class="recentMatches--header_text">Recent Matches</h1>
      @php $matchCount = 0; @endphp
      @foreach ($matches->sortBy('date')->reverse() as $match)
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

  <div class="teams">

    <h1>Our Teams</h1>

    @foreach ($teams as $team)
      @if ($team->active == '1')
        <a class="team" href="/team/{{ $team->slug }}" >
            <h3>{{ $team->name }}</h3>
            <div class="teamTint"></div>
        </a>
      @endif
    @endforeach
  </div>

  <div class="twitch">

    <div id="twitch-embed" style="margin: auto"></div>

    <!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
    <script type="text/javascript">
      new Twitch.Embed("twitch-embed", {
        width: 854,
        height: 480,
        channel: "quixzesports",
        theme: "dark",
        layout: "video",
        muted: true
      });
    </script>

  </div>

  </body>
  </html>


@endsection
