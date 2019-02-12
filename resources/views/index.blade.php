@extends('layouts.default')
@section('title', 'Home')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta itemprop="description" content="{{ $index->aboutContent }}">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta property="og:description" content="{{ $index->aboutContent }}">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - Home">
  <meta name="twitter:description" content="{{ $index->aboutContent }}">
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

  <div class="background_top">
    <h1>Quixz<span>eSports</span></h1>
  </div>

  <div class="arrow">
    <a class="fas fa-angle-down arrow_button" href="#about"></a>
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
    @endif
    <div class="news">
      <?php $articleCount = 0 ?>
      @foreach ($articles as $article)
      <?php $articleCount++ ?>
      @if ($articleCount <= 2)
      <a class="article_list" href=" {{ url('/news', $article->slug) }}">
        <img src="{{ asset('/images/' . $article->image) }}" alt="some dummy text" og:image>
        <h1>{{ $article->title }}</h1>
        <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
        <p class="news__desc">{!! strip_tags(substr($article->body, 0, 100)) !!}...</p>
        <p>Read more...</p>
        <hr>
      </a>
        @endif
      @endforeach
    </div>
  </div>

  <div class="teams">

    <h1>Our Teams</h1>

@foreach ($teams as $team)
  @if ($team->active == '1')
    <a class="team" href="/teams/{{ $team->slug }}" style="background-image: url({{ asset('images/' . $team->image) }}); background-repeat: no-repeat; background-size: cover;)">
        <h3>{{ $team->name }}</h3>
        <div class="teamTint">

        </div>
    </a>
  @endif
@endforeach
  </div>

  <div class="upcomingTournaments">

    <h1>Ongoing Tournaments</h1>
    @php $tournCount = 0; @endphp
    @foreach ($tournaments as $tourn)
      @php
        $date_now = date("d M Y"); // this format is string comparable
        $tournDate = date('d M Y', strtotime($tourn->date));
      @endphp
      @if ($date_now < $tournDate && $tournCount < 2 && $tourn->finished == '0')
        @php $tournCount ++ @endphp
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
      @if ($tournCount == 0)
        @php $tournCount ++ @endphp
        <h4>No upcoming tournaments</h4>
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

  </body>
  </html>


@endsection
