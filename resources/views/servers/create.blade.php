@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>


<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Add New Server</h1>
    <hr>
    {!! Form::open(['route' => 'servers.store', 'id' => 'form']) !!}
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', '', array('class' => 'form-control')) }}

      {{ Form::label('serverIp', 'Server Ip:') }}
      {{ Form::text('serverIp', '', array('class' => 'form-control')) }}

      {{ Form::submit('Publish', array('class' => 'btn btn-success mt-3')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>

<script>
jQuery(function($) {
  $.slugify("Ätschi Bätschi"); // "aetschi-baetschi"
  $('#slug-target').slugify('#slug-source'); // Type as you slug

  $("#slug-target").slugify("#slug-source", {
  	separator: '_' // If you want to change separator from hyphen (-) to underscore (_).
  });
});
</script>

@endsection
