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
          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/news">News posts</a></h5>
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
                      </a>
                    </div>
                  @endif
                @endforeach
                </div>
              <a href="/admin/news" class="btn btn-info btn-sm">View</a>
              <a href="/admin/news/create" class="btn btn-success btn-sm">Add</a>
            </div>
          </div>

          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/matches">Matches</a></h5>
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
                          <h7 class="card-text text-muted">VS {{ $match->enemy }}</h7> <br>
                          <a style="margin-top:.3rem" href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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

        </div>
<div class="row">
      <div class="card " style="width: 100%; margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/tournaments">Tournaments</a></h5>
          <h6 class="card-subtitle mb-2 text-muted">Upcoming</h6>
          <div class="row">
            @php $tournCount = 0; @endphp
            @foreach ($tournaments as $tourn)
              @php
                $date_now = date("d M Y"); // this format is string comparable
                $tournDate = date('d M Y', strtotime($tourn->date));
              @endphp
              @if ($date_now < $tournDate && $tournCount < 3)
                @php $tournCount ++ @endphp
                <div class="col-sm-6" style="margin-bottom: 1rem">
                  <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><a href="/admin/tournaments/{{ $tourn->id }}">{{ $tourn->name }}</a></h5>
                      <h7 class="card-text">{{ $tourn->team->name }}</h7> <br>
                      <h7 class="card-text">{{ date('d M Y', strtotime($tourn->date)) }}</h7> <br>
                      @php
                        $numMatches = 0;
                      @endphp
                      @foreach ($tourn->match as $match)
                          @php
                            $numMatches ++;
                          @endphp
                      @endforeach
                      <h6 class="card-title">Matches: {{ $numMatches }}</h6>
                      <a style="margin-top:.3rem" href="/admin/tournaments/{{ $tourn->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
          <a href="/admin/tournaments" class="btn btn-info btn-sm">View</a>
          <a href="/admin/tournaments/create" class="btn btn-success btn-sm">Add</a>
        </div>
      </div>
</div>

<div class="row">
      <div class="card " style="width: 100%; margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/teams">Teams</a></h5>
          <h6 class="card-subtitle mb-2 text-muted">Current teams</h6>
          <div class="row">
            @foreach ($teams as $team)
            <div class="col-sm-6" style="margin-bottom: 1rem">
              <div class="card " style="width: 100%;">
                <h5 class="card-header"><a href="/admin/teams/{{ $team->id }}/edit">{{ $team->name }}</a></h5>
                <div class="card-body">
                  <div class="btn-group" role="group">
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Players
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          @foreach ($team->player as $player)
                            @if ($player->active = false) @else
                              <a class="dropdown-item" href="/admin/players/{{ $player->id }}/edit">{{ $player->playerName }}</a>
                            @endif
                          @endforeach
                        </div>
                      </div>
                        <a class="btn btn-secondary btn-sm" href="/team/{{ $team->slug }}">
                          Team Page
                        </a>
                        <a class="btn btn-warning btn-sm" href="/admin/teams/{{ $team->id }}/edit">
                          Edit
                        </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <a href="/admin/teams" class="btn btn-info btn-sm">View</a>
          <a href="/admin/players" class="btn btn-warning btn-sm">View Players</a>
          <a href="/admin/teams/create" class="btn btn-success btn-sm">Add Team</a>
        </div>
      </div>
</div>

  <div class="row">
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/users">Accounts</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/users" class="btn btn-info btn-sm">View</a>
          <a href="/register" class="btn btn-success btn-sm">Add</a>
        </div>
      </div>
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/management">Management</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/management" class="btn btn-info btn-sm">View</a>
          <a href="/admin/management/create" class="btn btn-success btn-sm">Add</a>
        </div>
      </div>
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/about">About</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/about" class="btn btn-warning btn-sm">Edit</a>
        </div>
      </div>
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/index/1/edit">Index & Social Media</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/index/1/edit" class="btn btn-warning btn-sm">Edit</a>
        </div>
      </div>
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/players">Players</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/players" class="btn btn-info btn-sm">View</a>
          <a href="/admin/players/create" class="btn btn-success btn-sm">Add</a>
        </div>
      </div>
      <div class="card" style="width: calc(33.333% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
        <div class="card-body">
          <h5 class="card-title"><a href="/admin/servers">Servers</a></h5>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
          <a href="/admin/servers" class="btn btn-info btn-sm">View</a>
          <a href="/admin/servers/create" class="btn btn-success btn-sm">Add</a>
        </div>
      </div>
  </div>
</div>
      @endif


      @if($role == 'Player')
        as a player <br>

        <div class="row">
          <div class="card " style="width: 100%; margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/teams">Teams</a></h5>
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
              <a href="/admin/players" class="btn btn-warning btn-sm">View Players</a>
            </div>
          </div>

          <div class="card " style="width: calc(50% - 1rem); margin: .5rem; margin-bottom: 1.5rem;">
            <div class="card-body">
              <h5 class="card-title"><a href="/admin/matches">Matches</a></h5>
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
                          <a style="margin-top:.3rem" href="/admin/matches/{{ $match->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
        </div>
      </div>
      @endif
  </div>
</div>
@endsection
