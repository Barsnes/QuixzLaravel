<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@php echo Config::get('app.name'); @endphp - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF="/SHORTCUTICON.png">
  <meta name="google-site-verification" content="x7yK7kt6bcjL-iz3Vw9X0BDJlCR8mjrBVt_rDVekI04" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  {{ Html::style('css/master.css') }}
  {{ Html::style('css/fontawesome/css/all.css') }}
  <link href="/assets/css/fontawesome/css/all.css" rel="stylesheet">
  @yield('stylesheets')
  <!-- Scrips -->
  {{ Html::style('js/jquery.js') }}
  {{ Html::style('js/md2html.js') }}
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
    <a href="/"><img src="/assets/image/logo/logo_500.png" alt="Quixz eSports logo"></a>
    <nav>
      <div class="toggle">
        <i class="fas fa-bars menu" aria-hidden="true"></i>
      </div>
      <ul class="navlist">
        <li><a href="/index">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/news">News</a></li>
        <li><a href="/teams">Teams</a></li>
        <li><a href="/servers">Servers</a></li>
        @if ($role == 'Admin')
          <li><a href="/home">Admin Dashboard</a></li>
        @endif
      </ul>
    </nav>
</div>

@yield('content')

<div class="footer">
  <ul>
    <li>Copyright © 2018 Quixz eSports All Rights Reserved.</li>
    <li style="color:#F8B52A;"></li>
  </ul>
  <img class="footer_logo" src="/assets/image/logo/logo_500.png" alt="Quixz eSports logo">

  <div class="links">
    <a href="/downloads"><h3>Downloads</h3></a>
    <a href="/management"><h3>Management</h3></a>
  </div>

    <div class="media--links">
        <a class="fab fa-youtube-square" href="https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw" target="_blank"></a>
        <a class="fab fa-facebook-square" href="https://www.facebook.com/quixzesports" target="_blank"></a>
        <a class="fab fa-twitter-square" href="https://twitter.com/QuixzeSports" target="_blank"></a>
        <a class="fab fa-steam-square" href="https://steamcommunity.com/groups/QuixzFan" target="_blank"></a>
        <a class="fab fa-discord" href="https://quixz.eu/discord" target="_blank"></a>
        <a class="fab fa-twitch" href="https://www.twitch.tv/quixzesports" target="_blank"></a>
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
