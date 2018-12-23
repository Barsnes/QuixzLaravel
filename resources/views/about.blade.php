@extends('layouts.default')
@section('title', 'About Us')

@section('seo')
  <!-- Google / Search Engine Tags -->
  <meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - About">
  <meta itemprop="description" content="{!! strip_tags(substr($about->content)) !!}">
  <meta itemprop="image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://quixz.eu">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@php echo Config::get('app.name'); @endphp - About">
  <meta property="og:description" content="{!! strip_tags(substr($about->content)) !!}">
  <meta property="og:image" content="{{ asset('/assets/image/about/about_middle.png') }}">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@php echo Config::get('app.name'); @endphp - About">
  <meta name="twitter:description" content="{!! strip_tags(substr($about->content)) !!}">
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

  <div class="about_body">
    <div class="about_content">

      <h1>{{ $about->title }}</h1>

      <p>
        {{-- @markdown($about->content) --}}

          {!! $about->content !!}

      </p>

    </div>
  </div>


<style media="screen">
  .about_content img {
    width: 100%;
    height: 100%
  }
</style>

@endsection
