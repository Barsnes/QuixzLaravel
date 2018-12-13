@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: false,
  images_upload_url: 'localhost:8000/postAcceptor.php',
  images_upload_base_path: 'public/images/',
  images_upload_credentials: true,
  convert_urls: false,
  images_upload_handler: function (blobInfo, success, failure) {
    var xhr, formData;

    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', 'localhost:8000/postAcceptor.php');

    xhr.onload = function() {
      var json;

      if (xhr.status != 200) {
        failure('HTTP Error: ' + xhr.status);
        return;
      }

      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
        failure('Invalid JSON: ' + xhr.responseText);
        return;
      }

      success(json.location);
    };

    formData = new FormData();
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
  }
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
      {{ Form::file('image', array('class' => 'form-control')) }}

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
// window.onbeforeunload = function (e) {
//   return 'Are you sure?';
// };
</script>

@endsection
