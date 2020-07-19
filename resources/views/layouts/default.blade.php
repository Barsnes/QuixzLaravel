<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@php echo Config::get('app.name'); @endphp - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF=" {{ asset('/SHORTCUTICON.png') }}">
  <meta name="google-site-verification" content="x7yK7kt6bcjL-iz3Vw9X0BDJlCR8mjrBVt_rDVekI04" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="/css/master.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-LRlmVvLKVApDVGuspQFnRQJjkv0P7/YFrw84YYQtmYG4nK8c+M+NlmYDCv0rKWpG" crossorigin="anonymous">

  @yield('stylesheets')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110310303-3"></script>

  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="85f2f803-6554-42c4-9c8b-234e6e2e6425" type="text/javascript" async></script>

  <script type="text/plain" data-cookieconsent="statistics">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-110310303-3', 'auto');
    ga('send', 'pageview');
</script>

  <!-- Scrips -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  {{-- <script src="{{ asset('js/md2html.js') }}"></script> --}}
  <script async src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  @yield('seo')

</head>
<body>
<div class="header">
    <a href="/"><img src="/assets/image/logo/mascot-500.png" alt="Quixz Esports logo"></a>
    <nav class="navbar">
      <div class="toggle">
        <i class="fas fa-bars menu" aria-hidden="true"></i>
      </div>
      <ul class="navlist">
        <li><a class="{{ (Request::is('index') || Request::is('/') ? 'onSite' : '') }}" href="/">Home</a></li>
        <li><a class="{{ (Request::is('about') || Request::is('about/*') ? 'onSite' : '') }}" href="/about">About</a></li>
        <li><a class="{{ (Request::is('news') || Request::is('news/*') ? 'onSite' : '') }}" href="/news">News</a></li>
        <li><a class="{{ (Request::is('teams') || Request::is('team/*') ? 'onSite' : '') }}" href="/teams">Teams</a></li>
        <li><a target="_blank" href="/shop">Shop</a></li>
        @if ($role == 'Admin' || $role == 'Player' || $role == 'Captain')
          <li><a href="/admin">Admin Dashboard</a></li>
        @endif
      </ul>
    </nav>
</div>

@yield('content')

<div class="sponsors">
  <h3>Sponsored by</h3>
  @foreach ($sponsors as $sponsor)
    @if ($sponsor->active != 0)
      <a target="_blank" href="{{ $sponsor->website }}"><img src="{{ asset('images/' . $sponsor->image) }}" alt="{{ $sponsor->name }}"></a>
    @endif
  @endforeach
</div>

<div class="footer">

  <div class="footer--left">
    <ul>
      <li>Copyright © {{ date("Y") }} Quixz Esports All Rights Reserved.</li>
    </ul>
  </div>

  <div class="footer--middle">
    <ul>
      <li class="title">Links</li>
      <li><a href="/downloads">Downloads</a></li>
      <li><a href="/management">Management</a></li>
      {{-- <li><a href="/servers">Servers</a></li> --}}
    </ul>
  </div>

  <div class="footer--middle">
    <ul>
      <li class="title">Legal</li>
      <li><a href="/privacy-policy-de">Privacy Policy (DE)</a></li>
      <li><a href="/statutes-de">Statutes (DE)</a></li>
    </ul>
  </div>

  <div class="footer--right">
    <ul>
      <li>Quixz Esports<br>
      6850 Dornbirn, Austria<br>
      ZVR-Zahl 1373981873<br>
    contact@quixz.eu</li>
      <li style="margin-top: 1rem"><a href="//www.dmca.com/Protection/Status.aspx?ID=784f56d8-7fd5-4c76-b3c3-8d791736ad0e" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w250-5x1-08.png?ID=784f56d8-7fd5-4c76-b3c3-8d791736ad0e"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script></li>
    </ul>
  </div>

  <ul class="social">
      <li><a class="fab fa-youtube-square" href="{{ $social->youtube }}" target="_blank"></a></li>
      <li><a class="fab fa-facebook-square" href="{{ $social->facebook }}" target="_blank"></a></li>
      <li><a class="fab fa-twitter-square" href="{{ $social->twitter }}" target="_blank"></a></li>
      <li><a class="fab fa-steam-square" href="{{ $social->steam }}" target="_blank"></a></li>
      <li><a class="fab fa-discord" href="{{ $social->discord }}" target="_blank"></a></li>
      <li><a class="fab fa-twitch" href="{{ $social->twitch }}" target="_blank"></a></li>
  </ul>

    <img class="footer_logo" src="/assets/image/logo/logo-1000.png" alt="Quixz Esports logo">
</div>

  <script type="text/javascript">
      $(document).ready(function(){
        $('.menu').click(function(){
          $('.navlist').toggleClass('active')
          $('i').toggleClass('notactive');
        })
      })
  </script>

  <script>
   $(document).ready(function(){
    $("a").on('click', function(event) {
      if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 1200, function(){
          window.location.hash = hash;
        });
      }
    });
  });
  </script>
</body>
