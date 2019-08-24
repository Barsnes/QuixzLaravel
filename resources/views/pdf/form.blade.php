<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<div class="">
  <h1><img src="https://quixz.eu/assets/image/logo/logo_500.png" alt="Quixz Logo">   Quixz eSports - Member</h1>
</div>

<hr>

<div class="">
  <p><b>Name:</b> {{ $first_name }}
  @if (isset($player_name))
      "<span style="color:#F8B52A">{{ $player_name }}</span>"
  @endif {{ $last_name }}</p>
  <p><b>Email:</b> {{ $email }}</p>
  @if (isset($phone))
    <p><b>Phone:</b> {{ $phone }}</p>
  @endif
  <p><b>DOB:</b> {{ $date_of_birth }}</p>
  @if (isset($country))
    <p><b>Country:</b> {{ $country }}</p>
  @endif
  <p><b>City:</b> {{ $city }}</p>
  @if ($zip)
      <p><b>Zip:</b> {{ $zip }}</p>
  @endif

  <p><b>Street:</b> {{ $street }}</p>

  @if (isset($steam_id))
    <p><b>Steam Id:</b> {{ $steam_id }}</p>
  @endif

  @if (isset($discord))
    <p><b>Discord:</b> {{ $discord }}</p>
  @endif
</div>

<div class="agreeButtons">
  <input checked required type="checkbox" name="agree" value="true">
  <label for="agree">I agree to actively help the club to pursue it's goals and will obey all rules set up by the board or the member assembly</label><br>

  <input checked required type="checkbox" name="statutes" value="true">
  <label for="statutes">I have read, and agree to the  <a href="https://quixz.eu/statutes-de">Statutes</a></label><br>

  <input checked required type="checkbox" name="privacy-policy" value="true">
  <label for="privacy-policy">I consent to the processing of my data under the <a href="https://quixz.eu/privacy-policy-de">Privacy Policy</a></label><br>

  <input checked required type="checkbox" name="join" value="true">
  <label for="join">I would like to join the club 'Quixz eSports'</label><br>

  <input checked required type="checkbox" name="member" value="true">
  <label for="member">I agree to regularly set one of the General Assembly
To pay membership fee (Currently no membership fee is set)</label><br>
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
