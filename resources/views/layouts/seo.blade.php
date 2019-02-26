<!-- Google / Search Engine Tags -->
<meta itemprop="name" content="@php echo Config::get('app.name'); @endphp - @yield('title')">
<meta itemprop="description" content="{{ page.description }}">
<meta itemprop="image" content="https://quixz.eu{{ page.image }}">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110310303-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110310303-3');
</script>

<!-- Facebook Meta Tags -->
<meta property="og:url" content="https://quixz.eu">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ site.title }} - {{ page.title }}">
<meta property="og:description" content="{{ page.description }}">
<meta property="og:image" content="https://quixz.eu{{ page.image }}">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ site.title }} - {{ page.title }}">
<meta name="twitter:description" content="{{ page.description }}">
<meta name="twitter:image" content="https://quixz.eu{{ page.image }}">

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
 "name": "Tobias Barsnes"
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
