<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>Nytt medlem</h1>
    <hr>
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

  </body>
</html>
