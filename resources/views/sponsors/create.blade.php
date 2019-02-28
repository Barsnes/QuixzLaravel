@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>


<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Add New Sponsor</h1>
    <hr>
    {!! Form::open(['route' => 'sponsors.store', 'id' => 'form', 'files' => true]) !!}
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', '', array('class' => 'form-control')) }}

      {{ Form::label('website', 'Website:') }}
      {{ Form::text('website', '', array('class' => 'form-control')) }}

      <div class="row">
        <div class="col">
          <label for="image">Logo: <em class="text-muted">Keep under: 1000x800</em></label>
          <input type="file" name="image" value="image" class="form-control">
        </div>
        <div class="col">
          <label for="active">Active</label>
          <select class="form-control" name="active">
            <option selected value="1">Active</option>
            <option value="0">Not Active</option>
          </select>
        </div>
      </div>

      {{ Form::submit('Publish', array('class' => 'btn btn-success mt-3')) }}
    {!! Form::close() !!}
    <hr>
  </div>
</div>

@endsection
