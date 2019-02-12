@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/tournaments/create">Add torunament</a>
  </div>
  <div class="col-md-12">
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($tournaments as $tourn)
          <div class="card " style="width: 20rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $tourn->name }}</h5>
              <h5 class="card-title">{{ date('d F Y', strtotime($tourn->date)) }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $tourn->team->name }}</h6>
              @php
                $numMatches = 0;
              @endphp
              @foreach ($tourn->match as $match)
                  @php
                    $numMatches ++;
                  @endphp
              @endforeach
              <h6 class="card-title">Matches: {{ $numMatches }}</h6>
              <a href="/admin/tournaments/{{ $tourn->id }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/tournaments/{{ $tourn->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
