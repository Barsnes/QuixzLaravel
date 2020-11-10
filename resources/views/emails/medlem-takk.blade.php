<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Nytt medlem i Quixz Esports!</h1>
    <hr>
    <p>Innen en uke kommer vi til å sende deg en faktura med 1 års medlemskontigent, etter denne er betalt er du fullt medlem!</p>

    <hr>
    <h3>Informasjonen vi har lagret på deg:</h3>
    <p><b>Navn:</b> {{ $form->first_name }} {{ $form->last_name }}</p>
    <p><b>Email:</b> {{ $form->email }}</p>
    @if (isset($form->phone))
      <p><b>Telefon:</b> {{ $form->phone }}</p>
    @endif
    <p><b>Fødselsdato:</b> {{ $form->date_of_birth }}</p>
    <p><b>Adresse:</b> {{ $form->adress }}</p>

    @if (isset($form->steam_id))
      <p><b>Steam Id:</b> {{ $form->steam_id }}</p>
    @endif

    @if (isset($form->discord))
      <p><b>Discord:</b> {{ $form->discord }}</p>
    @endif
    <hr>

    <img src="https://quixz.eu/assets/image/logo/logo-1000.png" alt="Quixz Logo">

  </body>
</html>
