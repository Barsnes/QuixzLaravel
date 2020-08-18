@extends('layouts.default')
@section('title', 'About Us')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - About">
  <meta itemprop="description" content="{!! strip_tags(substr($about->content, 0, 100)) !!}">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - About">
  <meta property="og:description" content="{!! strip_tags(substr($about->content, 0, 100)) !!}">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - About">
  <meta name="twitter:description" content="{!! strip_tags(substr($about->content, 0, 100)) !!}">
  <meta name="twitter:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

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

  <div class="about_body">
    <div class="about_content">

      <h1>{{ $about->title }}</h1>

      <p>

          {!! $about->content !!}

      </p>

    </div>
  </div>

  <div class="teamHeader">
    <h1>Management</h1>
  </div>

  <div class="teamBody">
    @foreach ($players as $player)
      <a style="text-decoration:none; color:#FFF" class="card" href="/management/{{ $player->slug }}">
        <img loading="lazy" src="{{ asset('/images/' . $player->image) }}" alt="" style="width:100%">
        <div class="container">
          <h2 syle="text-decoration: none; color: #FFF">{{ $player->name }}</h2>
        </div>
      </a>
    @endforeach
  </div>


<style media="screen">
  .about_content img {
    width: 100%;
    height: 100%
  }
</style>

@endsection
