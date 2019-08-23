<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <h1>New Member</h1>
    <hr>
    <p><b>Name:</b> {{ $form->first_name }}
    @if (isset($form->player_name))
        "<span style="color:#F8B52A">{{ $form->player_name }}</span>"
    @endif {{ $form->last_name }}</p>
    <p><b>Email:</b> {{ $form->email }}</p>
    @if (isset($form->phone))
      <p><b>Phone:</b> {{ $form->phone }}</p>
    @endif
    <p><b>DOB:</b> {{ $form->date_of_birth }}</p>
    @if (isset($form->country))
      <p><b>Country:</b> {{ $form->country }}</p>
    @endif
    <p><b>City:</b> {{ $form->city }}</p>
    <p><b>Zip:</b> {{ $form->zip_code }}</p>
    <p><b>Street:</b> {{ $form->street }}</p>

    @if (isset($form->steam_id))
      <p><b>Steam Id:</b> {{ $form->steam_id }}</p>
    @endif

    @if (isset($form->discord))
      <p><b>Discord:</b> {{ $form->discord }}</p>
    @endif

    <hr>
      <h4 style="color: #2B63AF">Wichtige Hinweise</h4>
      <p>Fields marked with * must be filled out , all other fields may be left blank.</p>
      <br>
      <p>Im portant information might only be sent through online communication services, such as Discord. The member assembly can also be held online through such services.</p>
      <br>
      <p>Sending in this form does not automatically make you a member of the club. The board decides on every single application on a case by case basis and will let you know their decision shortly.</p>
      <br>
      <p>The location of this contract is the headquarter of the club (6850 Dornbirn, Austria)</p>
      <br>
      <p>Our s tatutes can be found here (German only currently): https://quixz.eu/statutes-de</p>
      <br>
      <p>You can find our privacy policy here (German only currently): https://quixz.eu/privacy-policy-de</p>

      <hr>
      <h4 style="color: #2B63AF">Zustimmungen/Consents</h4>
      <p><input checked required type="checkbox" value="true">I have read the statues and agree with them.</p>
      <br>
      <p><input checked required type="checkbox" name="statutes" value="true">I consent to the usage of my personal data for the purposes stated in the Privacy Policy. My email address may be used to send me important information about the club like invitations for me mber assemblies</p>
      <br>
      <p><input checked required type="checkbox" value="true">I am aware that the member assembly can set a mandatory membership fee. When a membership fee is set for the first time, all members who disagree with paying a membership fee are granted the right to im mediately cancel their membership</p>
      <br>
      <p><input checked required type="checkbox" value="true">I want to join the club ‘Quixz Esports’.</p>
      <br>


  </body>
</html>
