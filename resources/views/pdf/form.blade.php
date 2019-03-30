<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<div class="">
  <h1><img src="https://quixz.eu/assets/image/logo/logo_500.png" alt="Quixz Logo">   Quixz eSports - Member</h1>
</div>

<hr>

<div class="">
  <p><b>Name:</b> {{ $first_name }} "<span style="color:#F8B52A">{{ $player_name }}</span>" {{ $last_name }}</p>
  <p><b>Email:</b> {{ $email }}</p>
  @if (isset($phone))
    <p><b>Phone:</b> {{ $phone }}</p>
  @endif
  <p><b>DOB:</b> {{ $date_of_birth }}</p>
  <p><b>Country:</b> {{ $country }}</p>
  <p><b>City:</b> {{ $city }}</p>
  <p><b>Zip:</b> {{ $zip }}</p>
  <p><b>Street:</b> {{ $street }}</p>
</div>

<style media="screen">

  * {
    color: #FFF;
  }

  body {
    background-color: #232323;
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

</style>
