@extends('layouts.default')
@section('title'){{ $article->title }}@endsection

  @section('seo')
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://quixz.eu">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta property="og:description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta property="og:image" content="{{ asset('/images/' . $article->image) }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta itemprop="description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta itemprop="image" content="{{ asset('/images/' . $article->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta name="twitter:description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta name="twitter:image" content="{{ asset('/images/' . $article->image) }}">

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
     "https://www.gamer.no/klubber/quixz-esports/43274/lag/43275",
     "https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw"
     ]}
    </script>

  @endsection

@section('content')

<div class="article">
  <img loading="lazy" src="{{ asset('/images/' . $article->image) }}" alt="dummy text" og:image></img>

  <h1>{{ $article->title }}</h1>
  <h5 style="font-size:.9em; color:#FFF; letter-spacing:1px">Written by {{ $article->author }}</h5>
  <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
  @if ($article->team_id == '')
    <h5>Category: News</h5>
  @else
    <h5>Category: {{ $article->team->name }}</h5>
  @endif
  <hr>
    {!! $article->body !!}
  </div>

@endsection
