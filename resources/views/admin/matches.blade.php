@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/matches/create">Add match</a>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($matches as $match)
          <div class="card " style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $match->title }}</h5>
              <h5 class="card-title">{{ date('d F Y', strtotime($match->date)) }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $match->game->name }}</h6>
              <h5>Enemy: {{ $match->enemy }}</h5>
              <a href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
