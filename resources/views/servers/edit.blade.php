@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-8 offset-2">
    @include('errors')
  </div>
</div>

<div class="row">
  <div class="col-md-8 offset-2">
    <h1>Edit {{ $server->title }}</h1>
    <hr>
  {!! Form::model($server, array('route' => array('servers.update', $server->id),'method' => 'PUT')) !!}﻿
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, array('class' => 'form-control')) }}

      {{ Form::label('serverIp', 'Server Ip:') }}
      {{ Form::text('serverIp', $server->server, array('class' => 'form-control')) }}

      <div class="row" style="margin-top:2rem;">

      {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    {!! Form::close() !!}

    {!! Form::model($server, array('route' => array('servers.destroy', $server->id), 'files' => true, 'method' => 'DELETE')) !!}﻿
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {!! Form::close() !!}
    <a class="btn btn-secondary" href="/admin/matches" style="color: #fff">Cancel</a>
    </div>
    <hr>
  </div>
</div>

@endsection
