@extends('layouts.default')
@section('title', 'Management')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - Management">
  <meta itemprop="description" content="The management of Quixz Esports, is what makes everthing go around. The founder is Tobias Barsnes, but he can't work alone. Click to learn more about all the other staff members!">
  <meta itemprop="image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - Management">
  <meta property="og:description" content="The management of Quixz Esports, is what makes everthing go around. The founder is Tobias Barsnes, but he can't work alone. Click to learn more about all the other staff members!">
  <meta property="og:image" content="{{ asset('/assets/image/about/seo_image.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - Management">
  <meta name="twitter:description" content="The management of Quixz Esports, is what makes everthing go around. The founder is Tobias Barsnes, but he can't work alone. Click to learn more about all the other staff members!">
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

@endsection

@section('content')

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

@endsection
