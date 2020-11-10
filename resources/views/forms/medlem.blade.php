@extends('layouts.default')

@section('title', 'Join Club')

@section('content')
<div class="club">

  <h1>Bli Medlem</h1>

  <div class="clubForm">
    @if (Session::has('error') or $errors->any())
      @foreach ($errors->all() as $error)
          <div class="alert error">
            {{ $error }}
          </div>
      @endforeach
    @endif
    @if (Session::has('success'))
      <div class="alert success">
        {{ session('success') }}
      </div>
    @endif
    {!! Form::open(['route' => 'medlem.store']) !!}
    <div class="top">
      <div class="">
        <label for="first_name">Fornavn<span style="color:red">*</span></label>
        <input required type="text" name="first_name" placeholder="Ola">
      </div>

      <div class="">
        <label for="last_name">Etternavn<span style="color:red">*</span></label>
        <input required type="text" name="last_name" placeholder="Normann">
      </div>

      <div class="">
        <label for="email">Email<span style="color:red">*</span></label>
        <input required type="email" name="email" placeholder="ola.normann@email.com">
      </div>

      <div class="">
        <label for="phone">Telefon</label>
        <input type="text" name="phone" placeholder="123 45 678">
      </div>

      <div class="">
        <label for="phone">Adresse<span style="color:red">*</span></label>
        <input required type="text" name="adress" placeholder="Norgesveigen 1, 1234 Oslo">
      </div>

      <div class="">
        <label for="date_of_birth">Fødselsdato<span style="color:red">*</span></label>
        <input required type="date" name="date_of_birth" placeholder="2009-01-01">
      </div>
    </div>
    <div class="bottom">

      <div class="">
        <label for="steam_id">Steam ID</label>
        <input type="text" name="steam_id">
      </div>

      <div class="">
        <label for="discord">Discord</label>
        <input type="text" name="discord">
      </div>

    </div>

    <div class="formButton">
      <div class="agreeButtons">
        <input required type="checkbox" name="agree" value="true">
        <label for="agree"><span style="color:red">*</span>Jeg godtar <a href="https://drive.google.com/file/d/1Mn3IAMUErDNKdx0InBdyjgS1rOrYLfdO/view?usp=sharing" target="_blank">medlemskontrakten</a>.</label>

        <hr style="grid-column: 1 /3; width: 100%">

        <input required type="checkbox" name="privacy-policy" value="true">
        <label for="privacy-policy"><span style="color:red">*</span>Jeg godtar å betale 150kr i årskontigent for å bli medlem.</label>

      </div>
      <p style="margin-top: 1rem"><span style="color:red">*</span>Påkrevde felt</p>
      {{ Form::submit('Bli medlem!', array('class' => 'submitButton')) }}
    {!! Form::close() !!}
    </div>
  </div>
</div>


@endsection
