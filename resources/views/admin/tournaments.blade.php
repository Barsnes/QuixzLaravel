@extends('layouts.app')

@section('content')
  <div class="col-md-12">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/tournaments/create">Add Tournament</a>
  </div>
  <div class="col-md-12 mt-5">
    <h4 class="offset-2">Ongoing Tournaments</h4>
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($tournaments as $tourn)
          @if ($tourn->finished == '2')
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
          @endif
        @endforeach
    </div>
  </div>

  <div class="col-md-12 mt-3">
    <h4 class="offset-2">Upcoming Tournaments</h4>
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($tournaments as $tourn)
          @if ($tourn->finished == '0')
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
          @endif
        @endforeach
    </div>
  </div>

  <div class="col-md-12 mt-5">
    <h4 class="offset-2">Finished Tournaments</h4>
    <div class="row offset-2" style="margin-top:2rem;">
        @foreach ($tournaments as $tourn)
          @if ($tourn->finished == '1')
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
          @endif
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
