@extends('layouts.default')
@section('title'){{ $article->title }}@endsection

  @section('seo')
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta itemprop="description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta itemprop="image" content="{{ asset('/images/' . $article->image) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://quixz.eu">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta property="og:description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta property="og:image" content="{{ asset('/images/' . $article->image) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - {{ $article->title }}">
    <meta name="twitter:description" content="{!! strip_tags(substr($article->body, 0, 80)) !!}... Click to read more">
    <meta name="twitter:image" content="{{ asset('/images/' . $article->image) }}">

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

<div class="article">
  <img src="{{ asset('/images/' . $article->image) }}" alt="dummy text" og:image></img>

  <h1>{{ $article->title }}</h1>
  <h5 style="font-size:.9em; color:#FFF; letter-spacing:1px">Written by {{ $article->author }}</h5>
  <h5>{{ date('d M Y', strtotime($article->created_at)) }}</h5>
  @if ($article->team_id == '')

  @else
    <h5>Category: {{ $article->team->name }}</h5>
  @endif
  <hr>
    {!! $article->body !!}

  @if($role == 'Admin')
    <h3><a style="background-color: #fff; padding: .4rem 1rem" href="/admin/news/{{ $article->id }}/edit">Edit Post</a></h3>
  @endif
  </div>

<style>

  body {
    background-color: #2B63AF
  }

  .article {
    color: #000;
    width: 650px;
    margin: 0 calc((100% - 650px) / 2);
    padding-top: 1em;
    color: #FFF;
    margin-bottom: 10em;
    min-height: 100vh
  }

  .article img {
    width: 100%;
    height: auto;
    box-shadow: 0 0 30px #00000070
  }

  .article p {
    font-family: "Lato"
  }

  .article a {
    color: #F8B52A;
    text-decoration: none
  }

  .article h1 {
    margin-bottom: .2em
  }

  .article h5 {
    font-family: "Lato";
    padding: 0;
    margin: 0 .1rem;
    color: #F8B52A;
  }

  .article strong {
    color: #F8B52A
  }

@media (max-width:1050px) {

  .article {
    width: 100%;
    margin: 0;
  }

  .article p {
    padding: 0 1em
  }

  .article h1 {
    padding: 0 .5em
  }

  .article h5 {
    padding: 0 1rem;
  }

  .article hr {
    margin: .5em;
  }
}

</style>

@endsection
