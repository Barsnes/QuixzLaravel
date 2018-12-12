@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: false
});
</script>
@endsection

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
    {!! Form::open(['route' => 'news.store', 'files' => true]) !!}
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', '', array('class' => 'form-control')) }}

      {{ Form::label('author', 'Author:') }}
      {{ Form::text('author', $name, array('class' => 'form-control')) }}

      {{ Form::label('image', 'Image:') }}

      {{-- {{ Form::label('category_id', 'Category:') }}
      {{ Form::select('category_id', [
          '1' => 'Counter Strike',
          '2' => 'Rocket League',
          '3' => 'League of Legends',
          '4' => 'News',
          '5' => 'Overwatch',
          '6' => 'Hearthstone'
        ]) }} --}}
        <label for="category__id">Category:</label>
        <select name="category_id" class="form-control">
          <option value="">Choose One</option>
          @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
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
