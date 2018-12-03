<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Quixz eSports - @yield('title') </title>
  <link REL="SHORTCUT ICON" HREF="assets/image/logo/logo_500.png">
  <meta name="google-site-verification" content="x7yK7kt6bcjL-iz3Vw9X0BDJlCR8mjrBVt_rDVekI04" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="/assets/css/master.css">
  <link href="/assets/css/fontawesome/css/all.css" rel="stylesheet">
  <!-- Scrips -->
  <link href="/js/md2html.js">
</head>
<body>
<div class="header">
    <a href="/"><img src="assets/image/logo/logo_500.png" alt="Quixz eSports logo"></a>
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
      </ul>
    </nav>
</div>

@yield('content')

<div class="footer">
  <ul>
    <li>Copyright © 2018 Quixz eSports All Rights Reserved.</li>
    <li style="color:#F8B52A;"></li>
  </ul>
  <img class="footer_logo" src="assets/image/logo/logo_500.png" alt="Quixz eSports logo">

</div>
<div class="footer__partner">

    <div class="partner">
      <a href="" target="_blan" alt=""></a>
    </div>

</div>
<div class="footer">
    <div class="links">
      <a href="/downloads"><h3>Downloads</h3></a>
      <a href="/management"><h3>Management</h3></a>

      <div class="links_right">
        <a class="fab fa-youtube-square" href="https://www.youtube.com/channel/UChgzQGcnVEn_nqdSfnggkcw" target="_blank"></a>
        <a class="fab fa-facebook-square" href="https://www.facebook.com/quixzesports" target="_blank"></a>
        <a class="fab fa-twitter-square" href="https://twitter.com/QuixzeSports" target="_blank"></a>
        <a class="fab fa-steam-square" href="https://steamcommunity.com/groups/QuixzFan" target="_blank"></a>
        <a class="fab fa-discord" href="https://quixz.eu/discord" target="_blank"></a>
        <a class="fab fa-twitch" href="https://www.twitch.tv/quixzesports" target="_blank"></a>
      </div>
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
