@extends('layouts.app')

@section('script')
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yt4c5s5px656mcfoeugpsdwuzv0ptqo62r4o394melqwn44x"></script>
  <script>
  tinymce.init({ selector:'textarea',
  plugins:'image link autolink code advlist imagetools spellchecker media', automatic_uploads: true, menubar: false,
  });
  </script>
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2">
      @include('errors')
    </div>
  </div>
  <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      @if($role == 'Admin')
        <div class="row">
          <div class="col-md-8 offset-2">
            <p>You are logged in as {{ Auth::user()->name }}, a {{ Auth::user()->role }}.</p>
            <hr style="border: .5px solid #aaa">
          </div>
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
                @foreach ($matches->reverse() as $match)
                  @php
                    $matchDate = new DateTime($match['date']);
                    $date_now = new DateTime();
                  @endphp
                  @if ($date_now < $matchDate && $matchCount < 4)
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
              @if ($tourn->finished == '0' || $tourn->finished == '2' && $tournCount < 3)
                @php $tournCount ++ @endphp
                <div class="col-sm-6" style="margin-bottom: 1rem">
                  <div class="card" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title"><a href="/admin/tournaments/{{ $tourn->id }}">{{ $tourn->name }}</a><span style="font-size: .8rem"> - {{ $tourn->getFinished() }}</span></h5>
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
                            @if ($player->active == 'false') @else
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
        @php
          $player = Auth::user()->player
        @endphp
          <div class="row">
            <div class="col-md-8 offset-2">
              <p>You are logged in as {{ Auth::user()->name }}, a {{ Auth::user()->role }}.</p>
              <hr style="border: .5px solid #aaa">
              <h1>Edit {{ $player->playerName }}</h1>
              <hr>
              {!! Form::model($player, array('route' => array('players.update', $player->id), 'files' => true, 'method' => 'PUT')) !!}﻿
              <div class="row">
                <div class="col">
                  <label for="firstName">First Name:</label>
                  <input value="{{ $player->firstName }}" class="form-control" type="text" name="firstName">
                </div>
                <div class="col">
                  <label for="playerName">Player Name:</label>
                  <input value="{{ $player->playerName }}" class="form-control" type="text" name="playerName">
                </div>
                <div class="col">
                      <label for="lastName">Last Name:</label>
                      <input value="{{ $player->lastName }}" class="form-control" type="text" name="lastName">
              </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="team_id">Team:</label>
              <select disabled name="team_id" class="form-control">
                <option value="{{ $player->team->id }}">{{ $player->team->name }}</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
              <label for="image" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Image: <em class="text-muted">Size: 150x150</em></label>
              {{ Form::file('image', array('class' => 'form-control')) }}
            </div>
            <div class="col">
              <h5>Current image:</h5>
              <img src="{{ asset('images/' . $player->image) }}" style="width:100%" class="mx-auto d-block">
            </div>
            <div class="col">
              <label for="active">Active</label>
              <select class="form-control" name="active">
                @if ($player->active == 'true')
                  <option value="true" selected>Active</option>
                  <option value="false">Inactive</option>
                @else
                  <option value="false" selected>Inactive</option>
                  <option value="true">Active</option>
                @endif
              </select>
            </div>
          </div>


                  <div class="row" style="margin-top:2rem">
                    <div class="col">
                      <h2>Social Media:</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="date">Steam:</label>
                      <input value="{{ $player->steam }}" class="form-control" type="text" name="steam">
                    </div>
                    <div class="col">
                      <label for="date">Twitter:</label>
                      <input value="{{ $player->twitter }}" class="form-control" type="text" name="twitter">
                    </div>
                    <div class="col">
                      <label for="date">Youtube:</label>
                      <input value="{{ $player->youtube }}" class="form-control" type="text" name="youtube">
                    </div>
                  </div>
                  <div class="row" style="margin-bottom:2rem">
                    <div class="col">
                      <label for="date">Twitch:</label>
                      <input value="{{ $player->twitch }}" class="form-control" type="text" name="twitch">
                    </div>
                    <div class="col">
                      <label for="date">Instagram:</label>
                      <input value="{{ $player->instagram }}" class="form-control" type="text" name="instagram">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <label for="body">About Player</label>
                      <textarea name="body"class="form-control">{{ $player->body }}</textarea>
                    </div>
                  </div>

                {{ Form::submit('Publish', array('class' => 'btn btn-success')) }}
              {!! Form::close() !!}
              <hr>
            </div>
          </div>
        </div>
      @endif
  </div>
@endsection
