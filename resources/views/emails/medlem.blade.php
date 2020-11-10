<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Nytt medlem</h1>
    <hr>
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
    <hr>

  </body>
</html>
