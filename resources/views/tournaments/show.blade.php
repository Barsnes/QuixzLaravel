@extends('layouts.app')

@section('content')
  <div class="col-md-10">
    <a class="btn btn-block btn-success col-md-2 offset-2" href="/admin/tournaments/create">Add tournament</a>
  </div>
  <div class="col-md-10">
    <div class="row-md-2 offset-2" style="margin-top:2rem;">
          <div class="card" style="width:100%">
            <div class="card-body">
              <h5 class="card-title">{{ $tournament->name }}</h5>
              <h5 class="card-title">{{ date('d F Y', strtotime($tournament->date)) }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $tournament->team->name }}</h6>
              <div class="col-12" style="margin-bottom: 1rem; width:100%">
                @php $matchCount = 0; @endphp
                @foreach ($tournament->match as $match)
                  @php
                    $date_now = date("d M Y"); // this format is string comparable
                    $matchDate = date('d M Y', strtotime($match->date));
                  @endphp
                  @if ($date_now < $matchDate && $matchCount < 3)
                    @php $matchCount ++ @endphp
                      <div class="card" style="width: 50%">
                        <div class="card-body">
                          <h7 class="card-text">{{ $match->team->name }}</h7> <br>
                          <h7 class="card-text">{{ date('d M Y', strtotime($match->date)) }}</h7> <br>
                          <h7 class="card-text text-muted">VS {{ $match->enemy }}</h7> <br>
                          <a style="margin-top:.3rem" href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                      </div>
                  @endif
                @endforeach
              </div>
              <a href="/admin/tournaments/{{ $tournament->id }}" class="btn btn-info btn-sm">View</a>
              <a href="/admin/tournaments/{{ $tournament->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            </div>
          </div>
    </div>
  </div>

<style media="screen">
  body {
    width: 100vw;
    overflow-x: hidden
  }
</style>
@endsection
