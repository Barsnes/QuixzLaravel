@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/servers/create">Add server</a>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($servers as $server)
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">Ip: {{ $server->server }}</h5>
              <h5 class="card-title">{{ $server->title }}</h5>

              <a href="/admin/servers/{{ $server->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
