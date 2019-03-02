<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@php echo Config::get('app.name'); @endphp - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF=" {{ asset('/SHORTCUTICON.png') }}">
  <meta name="google-site-verification" content="x7yK7kt6bcjL-iz3Vw9X0BDJlCR8mjrBVt_rDVekI04" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ mix('/css/master.css') }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-LRlmVvLKVApDVGuspQFnRQJjkv0P7/YFrw84YYQtmYG4nK8c+M+NlmYDCv0rKWpG" crossorigin="anonymous">

  @yield('stylesheets')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110310303-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-110310303-3');
  </script>

  <!-- Scrips -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  {{-- <script src="{{ asset('js/md2html.js') }}"></script> --}}
  <script async src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  @yield('seo')

</head>
<body>
<div class="header">
    <a href="/"><img src="/assets/image/logo/logo_500.png" alt="Quixz eSports logo"></a>
    <nav class="navbar">
      <div class="toggle">
        <i class="fas fa-bars menu" aria-hidden="true"></i>
      </div>
      <ul class="navlist">
        <li><a href="/index">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/news">News</a></li>
        <li><a href="/teams">Teams</a></li>
        <li><a href="/tournaments">Tournaments</a></li>
        @if ($role == 'Admin')
          <li><a href="/admin">Admin Dashboard</a></li>
        @elseif ($role == 'Player')
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
  <ul>
    <li>Copyright © {{ date("Y") }} Quixz eSports All Rights Reserved.</li>
    <li style="color:#F8B52A;"></li>
  </ul>
  <img class="footer_logo" src="/assets/image/logo/logo_500.png" alt="Quixz eSports logo">

  <div class="links">
    <a href="/downloads"><h3>Downloads</h3></a>
    <a href="/management"><h3>Management</h3></a>
    <a href="/servers"><h3>Servers</h3></a>
  </div>
    <div class="media--links">
        <a class="fab fa-youtube-square" href="{{ $social->youtube }}" target="_blank"></a>
        <a class="fab fa-facebook-square" href="{{ $social->facebook }}" target="_blank"></a>
        <a class="fab fa-twitter-square" href="{{ $social->twitter }}" target="_blank"></a>
        <a class="fab fa-steam-square" href="{{ $social->steam }}" target="_blank"></a>
        <a class="fab fa-discord" href="{{ $social->discord }}" target="_blank"></a>
        <a class="fab fa-twitch" href="{{ $social->twitch }}" target="_blank"></a>
    </div>
</div>

<!-- Hamburger Menu -->

  <script type="text/javascript">
      $(document).ready(function(){
        $('.menu').click(function(){
          $('.navlist').toggleClass('active')
          $('i').toggleClass('notactive');
        })
      })
  </script>

<!-- Smooth Scroll -->

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
