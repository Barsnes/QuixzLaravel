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
      {{ Form::text('author', $name, array('class' => 'form-control')) }}

      {{ Form::label('image', 'Image:') }}
      {{ Form::text('image', '', array('class' => 'form-control')) }}

      {{ Form::label('category_id', 'Category:') }}
      {{ Form::select('category_id', [
          '1' => 'Counter Strike',
          '2' => 'Rocket League',
          '3' => 'League of Legends',
          '4' => 'News',
          '5' => 'Overwatch',
          '6' => 'Hearthstone'
        ]) }}
        <br>
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
