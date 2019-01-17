@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
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

      <label for="image" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Image: <em class="text-muted">Size: 1200x600</em></label>
      <input type="file" name="image" value="image" class="form-control" data-toggle="tooltip" data-placement="top" title="Tooltip on top">

      {{-- {{ Form::label('category_id', 'Category:') }}
      {{ Form::select('category_id', [
          '1' => 'Counter Strike',
          '2' => 'Rocket League',
          '3' => 'League of Legends',
          '4' => 'News',
          '5' => 'Overwatch',
          '6' => 'Hearthstone'
        ]) }} --}}
        <label for="team_id">Category:</label>
        <select name="team_id" class="form-control">
          <option value="">Choose One</option>
          <option value="">None</option>
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
