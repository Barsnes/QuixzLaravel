@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/management/create">Add management person</a>
  </div>
  <div class="col-md-12">
    <h1 class="row offset-2" style="margin-top:2rem;">Inactive players</h1>
    <div class="row offset-2">
        @foreach ($players as $player)
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/management/{{ $player->slug }}">{{ $player->name }}</a></h5>
              <a href="/management/{{ $player->slug }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/management/{{ $player->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
