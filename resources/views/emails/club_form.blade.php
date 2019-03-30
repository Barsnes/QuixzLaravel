<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>New Member</h1>
    <hr>
    <p><b>Name:</b> {{ $form->first_name }} "<span style="color:#F8B52A">{{ $form->player_name }}</span>" {{ $form->last_name }}</p>
    <p><b>Email:</b> {{ $form->email }}</p>
    @if (isset($form->phone))
      <p><b>Phone:</b> {{ $form->phone }}</p>
    @endif
    <p><b>DOB:</b> {{ $form->date_of_birth }}</p>
    <p><b>Country:</b> {{ $form->country }}</p>
    <p><b>city:</b> {{ $form->city }}</p>
    <p><b>Zip:</b> {{ $form->zip_code }}</p>
    <p><b>Street:</b> {{ $form->street }}</p>

  </body>
</html>
