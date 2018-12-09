@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Create New Post</h1>
    <hr>
    {!! Form::open(['route' => 'news.store']) !!}
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', '', array('class' => 'form-control')) }}

      {{ Form::label('author', 'Author:') }}
      {{ Form::text('author', '', array('class' => 'form-control')) }}

      {{ Form::label('image', 'Image:') }}
      {{ Form::text('image', '', array('class' => 'form-control')) }}

      {{ Form::label('body', 'Body:')}}
      {{ Form::textarea('body', '', array('class' => 'form-control')) }}

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
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
