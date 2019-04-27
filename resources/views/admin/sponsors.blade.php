@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/sponsors/create">Add sponsor</a>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($sponsors as $sponsor)
          <div class="card" style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $sponsor->name }}</h5>
              {!! Form::model($sponsor, array('route' => array('sponsors.destroy', $sponsor->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
              {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
              {!! Form::close() !!}
            </div>
          </div>
        @endforeach
    </div>
  </div>

<style media="screen">
  body {
    width: 100vw;
    overflow-x: hidden
  }
</style>
@endsection
