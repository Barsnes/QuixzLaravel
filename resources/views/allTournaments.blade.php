@extends('layouts.default')

@section('title', 'Tournaments')

@section('content')

  <div class="upcomingTournaments">
    <div class="title">
      <h1>Ongoing Tournaments</h1>
    </div>
    @php $tournCount = 0; @endphp
    @foreach ($tournaments->reverse() as $tourn)
      @php
        $tournDate = new DateTime($tourn['date']);
        $date_now = new DateTime();
      @endphp
      @if ($tourn->finished == '2')
        @php $tournCount ++ @endphp
          <a class="tournamentBody" href="/tournaments/{{ $tourn->slug }}">
            <img src="{{ asset('images/' . $tourn->image) }}" alt="">
            <div class="tournamentInfoLeft">
              <h2>{{ $tourn->name }}</h2>
              <h3>{{ $tourn->team->name }}</h3>
            </div>
            <div class="tournamentInfoRight">
              <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
              <h3>{{ $tourn->getFinished() }}</h3>
            </div>
          </a>
          @continue
      @endif
    @endforeach
    @if ($tournCount == 0)
      @php $tournCount ++ @endphp
      <h4>No ongoing tournaments</h4>
    @endif
  </div>

  <div class="upcomingTournaments">
    <div class="title">
      <h1>Upcoming Tournaments</h1>
    </div>
    @php $tournCount = 0; @endphp
    @foreach ($tournaments->reverse() as $tourn)
      @php
        $tournDate = new DateTime($tourn['date']);
        $date_now = new DateTime();
      @endphp
      @if ($tourn->finished == '0')
        @php $tournCount ++ @endphp
          <a class="tournamentBody" href="/tournaments/{{ $tourn->slug }}">
            <img src="{{ asset('images/' . $tourn->image) }}" alt="">
            <div class="tournamentInfoLeft">
              <h2>{{ $tourn->name }}</h2>
              <h3>{{ $tourn->team->name }}</h3>
            </div>
            <div class="tournamentInfoRight">
              <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
              <h3>{{ $tourn->getFinished() }}</h3>
            </div>
          </a>
          @continue
      @endif
    @endforeach
    @if ($tournCount == 0)
      @php $tournCount ++ @endphp
      <h4 style="font-family: Lato">No upcoming tournaments</h4>
    @endif
  </div>

  <div class="upcomingTournaments">
    <div class="title">
      <h1>Finished Tournaments</h1>
    </div>
    @php $tournCount = 0; @endphp
    @foreach ($tournaments->reverse() as $tourn)
      @php
        $tournDate = new DateTime($tourn['date']);
        $date_now = new DateTime();
      @endphp
      @if ($tournCount < 2 && $tourn->finished == '1')
        @php $tournCount ++ @endphp
          <a class="tournamentBody" href="/tournaments/{{ $tourn->slug }}">
            <img src="{{ asset('images/' . $tourn->image) }}" alt="">
            <div class="tournamentInfoLeft">
              <h2>{{ $tourn->name }}</h2>
              <h3>{{ $tourn->team->name }}</h3>
            </div>
            <div class="tournamentInfoRight">
              <h2>{{ date('d M Y', strtotime($tourn->date)) }}</h2>
              <h3>{{ $tourn->getFinished() }}</h3>
            </div>
          </a>
          @continue
      @endif
    @endforeach
    @if ($tournCount == 0)
      @php $tournCount ++ @endphp
      <h4>No finished tournaments</h4>
    @endif
  </div>

@endsection
