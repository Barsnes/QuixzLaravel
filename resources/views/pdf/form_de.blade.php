<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<div class="">
  <h1><img src="https://quixz.eu/assets/image/logo/logo_500.png" alt="Quixz Logo">   Antrag auf Vereinsmitgliedschaft</h1>
</div>

<hr>

<div class="">
  <p><b>Vorname:</b> {{ $first_name }} {{ $last_name }}</p>
  <p><b>Nickname:</b> {{ $player_name }}</p>
  <p><b>Emailadresse:</b> {{ $email }}</p>
  @if (isset($phone))
    <p><b>Phone:</b> {{ $phone }}</p>
  @endif
  <p><b>Geburtsdatum:</b> {{ $date_of_birth }}</p>
  <p><b>Nationalität:</b> {{ $country }}</p>
  <p><b>Stadt:</b> {{ $city }}</p>
  <p><b>Postleitzahl:</b> {{ $zip }}</p>
  <p><b>Straße + Hausnummer:</b> {{ $street }}</p>
</div>
<div class="agreeButtons">
  <input checked required type="checkbox" name="agree" value="true">
  <label for="agree">Ich bin damit einverstanden, regelmäßig einen von der Mitgliederversammlung festgelegten
Mitgliedsbeitrag zu bezahlen. Aktuell ist kein Mitgliedsbeitrag festgelegt.</label><br>

  <input checked required type="checkbox" name="statutes" value="true">
  <label for="statutes">Ich habe die <a href="https://quixz.eu/statutes-de">Statuen</a> gelesen und stimme ihnen zu.</label><br>

  <input checked required type="checkbox" name="privacy-policy" value="true">
  <label for="privacy-policy">Ich stimme der Verarbeitung meiner Daten im Rahmen der <a href="https://quixz.eu/privacy-policy-de">Datenschutzrichtlinie</a> zu. Meine
Emailadresse darf für wichtige Informationen zum Verein, wie zum Beispiel Einladungen zu
Mitgliederversammlungen verwendet werden.</label><br>

  <input checked required type="checkbox" name="join" value="true">
  <label for="join">Ich möchte dem Verein ‚Quixz esports‘ beitreten.</label><br>

  <label style="margin-top:1rem" for="">Ein Account bei Discord ist zwar für den Antrag auf
Mitgliedschaft nicht nötig, wird für eine aktive Teilnahme an der Vereinsarbeit aber zwingend
vorausgesetzt.</label>

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
