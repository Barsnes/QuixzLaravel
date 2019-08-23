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
  <hr>
    <h4 style="color: #2B63AF">Wichtige Hinweise</h4>
    <p>Felder mit * müssen ausgefüllt werden, alle anderen Felder können frei gelassen werden.</p>
    <br>
    <p>Wichtige Informationen werden gegebenenfalls nur mit einem Onlinekommunikationsdienst, wie beispielsweise Discord, mitgeteilt. Auch die Mitgliederversammlung kann über Onlinedienste abgehalten werden.</p>
    <br>
    <p>Dieser Antrag bedeutet nicht automatisch die Aufnahme in den Verein. Der Vereinsvorstand entscheidet über jeden Mitgliedschaftsantrag einzeln und teilt seine Entscheidung zeitnah per Email mit.</p>
    <br>
    <p>Vertragsort ist der Sitz des Vereins (6850 Dornbirn, Österreich)</p>
    <br>
    <p>Die Statuten des Vereins können hier eingesehen werden: https://quixz.eu/statutes-de</p>
    <br>
    <p>Unsere Datenschutzerklärung findest du hier: https://quixz.eu/privacy-policy-de</p>

    <hr>
    <h4 style="color: #2B63AF">Zustimmungen/Consents</h4>
    <p><input checked required type="checkbox" value="true">Ich habe die Statuten gelesen und stimme ihnen zu.</p>
    <br>
    <p><input checked required type="checkbox" value="true">Ich stimme der Verarbeitung meiner Daten im Rahmen der Datenschutzrichtlinie zu. Meine Emailadresse darf für wichtige Informationen zum Verein, wie zum Beispiel Einladungen zu Mitgliederversammlungen verwendet werden.</p>
    <br>
    <p><input checked required type="checkbox" value="true">Ich nehme zur Kenntnis, dass die Mitgliederversammlung einen Mitgliedsbeitrag festsetzen kann. Bei erstmaliger Festsetzung eines Mitgliedsbeitrags wird Mitgliedern, die mit der Erhebung eines Mitgliedsbeitrags nicht einverstanden sind, ein Sonderkündigungsrecht ihrer Mitgliedschaft gewährt.</p>
    <br>
    <p><input checked required type="checkbox" value="true">Ich möchte dem Verein ‚Quixz Esports‘ beitreten. </p>
    <br>

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
