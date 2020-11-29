@php
error_reporting(E_ALL ^ E_DEPRECATED);
@endphp

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<div class="">
  <h1><img src="https://quixz.eu/assets/image/logo/logo-1000.png" alt="Quixz Logo">   Quixz Esports - Medlem</h1>
</div>

<hr>

<div class="">
  <p><b>Navn:</b> {{ $first_name }} {{ $last_name }}</p>
  <p><b>Email:</b> {{ $email }}</p>
  @if (isset($phone))
    <p><b>Telefon:</b> {{ $phone }}</p>
  @endif
  <p><b>Fødselsdato:</b> {{ $date_of_birth }}</p>
  <p><b>Adresse:</b> {{ $adress }}</p>

  @if (isset($steam_id))
    <p><b>Steam Id:</b> {{ $steam_id }}</p>
  @endif

  @if (isset($discord))
    <p><b>Discord:</b> {{ $discord }}</p>
  @endif
</div>

<div class="agreeButtons">
  <input checked required type="checkbox" name="agree" value="true">
  <label for="agree">Jeg har godtatt <a href="https://drive.google.com/file/d/1TymL0N5WoZQ0aXIFVrNEGB_vxeIPqVSh/view?usp=sharing">medlemskontrakten</a></label><br>
</div>

<style media="screen">

  * {
    color: #000;
  }

  body {
    margin: 0;
    padding: 0 2rem;
    font-family: 'Arial';
  }

  img {
    width: 5rem;
    display: inline-block;
    margin-top: 1.7rem;
  }

  h1 {
    width: 70%;
    display: inline-block;
  }

  a {
    text-decoration: none;
    color: #F8B52A
  }

</style>
