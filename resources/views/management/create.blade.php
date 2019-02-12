@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x"></script>
  <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: false,
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
    <h1>Add new player</h1>
    <hr>
    {!! Form::open(['route' => 'management.store', 'files' => true]) !!}
    <div class="row">
      <div class="col">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name">
      </div>
      <div class="col">
        <label for="job_title">Job Title:</label>
        <input class="form-control" type="text" name="job_title">
      </div>
    </div>
<div class="row">
  <div class="col">
    <label for="image" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Image: <em class="text-muted">Size: 150x150</em></label>
    {{ Form::file('image', array('class' => 'form-control')) }}
  </div>

  <div class="col">
    <label for="date">Email:</label>
    <input class="form-control" type="email" name="email">
  </div>
</div>


        <div class="row" style="margin-top:2rem">
          <div class="col">
            <h2>Social Media:</h2>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="date">Steam:</label>
            <input class="form-control" type="text" name="steam">
          </div>
          <div class="col">
            <label for="date">Twitter:</label>
            <input class="form-control" type="text" name="twitter">
          </div>
          <div class="col">
            <label for="date">Youtube:</label>
            <input class="form-control" type="text" name="youtube">
          </div>
        </div>
        <div class="row" style="margin-bottom:2rem">
          <div class="col">
            <label for="date">Twitch:</label>
            <input class="form-control" type="text" name="twitch">
          </div>
          <div class="col">
            <label for="date">Instagram:</label>
            <input class="form-control" type="text" name="instagram">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label for="body">About</label>
            <textarea name="body"class="form-control" rows="6"></textarea>
          </div>
        </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>
@endsection
