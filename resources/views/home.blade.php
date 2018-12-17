@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      You are logged in
      @if($role == 'Admin')
        as an admin <br>
        <div class="row">
          <div class="card " style="width: 100%; margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/users">Teams</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">Current teams</h6>
              <div class="row">
                @foreach ($teams as $team)
                <div class="col-sm-6" style="margin-bottom: 1rem">
                  <div class="card " style="width: 100%;">
                    <h5 class="card-header"><a href="/admin/teams/{{ $team->id }}/edit">{{ $team->name }}</a></h5>
                    <div class="card-body">
                      <div class="list-group list-group-flush">
                        @foreach ($team->player as $player)
                          <a class="list-group-item text-muted" href="/admin/players/{{ $team->id }}/edit">{{ $player->playerName }}</a>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              <a href="/admin/teams" class="btn btn-info btn-sm">View</a>
              <a href="/admin/teams/create" class="btn btn-success btn-sm">Add</a>
            </div>
          </div>

          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/users">News posts</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">Recent</h6>
                <div class="row">
                  @php
                    $articleCount = 0;
                  @endphp
                @foreach ($articles as $article)
                  @if ($articleCount < 4)
                  @php
                    $articleCount ++;
                  @endphp
                    <div class="col-sm-6" style="margin-bottom: 1rem">
                    <a href="/admin/news/{{ $article->id }}/edit">
                      <div class="card" style="width: 100%;">
                        <img class="card-img-top" src=" {{ asset('/images/' . $article->image) }} " alt="Card image cap">
                        <div class="card-body">
                          <h6 class="card-text">{{ $article->title }}</h6>
                        </div>
                      </div>
                    </div>
                    </a>
                  @endif
                @endforeach
                </div>
              <a href="/admin/teams" class="btn btn-info btn-sm">View</a>
              <a href="/admin/teams/create" class="btn btn-success btn-sm">Add</a>
            </div>
          </div>

          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/users">Matches</a></h5>
              <h6 class="card-subtitle mb-2 text-muted">Upcoming</h6>
              <div class="row">
                @php $matchCount = 0; @endphp
                @foreach ($matches as $match)
                  @php
                    $date_now = date("d M Y"); // this format is string comparable
                    $matchDate = date('d M Y', strtotime($match->date));
                  @endphp
                  @if ($date_now < $matchDate && $matchCount < 3)
                    @php $matchCount ++ @endphp
                    <div class="col-sm-6" style="margin-bottom: 1rem">
                      <div class="card" style="width: 100%;">
                        <div class="card-body">
                          <h7 class="card-text">{{ $match->team->name }}</h7> <br>
                          <h7 class="card-text">{{ date('d M Y', strtotime($match->date)) }}</h7> <br>
                          <h7 class="card-text text-muted">VS {{ $match->enemy }}</h7>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
              <a href="/admin/matches" class="btn btn-info btn-sm">View</a>
              <a href="/admin/matches/create" class="btn btn-success btn-sm">Add</a>
            </div>
          </div>

          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/users">Accounts</a></h5>
              <h6 class="card-subtitle mb-2 text-muted"></h6>
              <a href="/admin/users" class="btn btn-info btn-sm">View</a>
              <a href="/register" class="btn btn-success btn-sm">Add</a>
            </div>
          </div>
        </div>
      </div>
      @endif


      @if($role == 'Player')
        as a player
      @endif
  </div>
</div>
@endsection
