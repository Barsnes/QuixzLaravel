@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Role</label>
                          <div class="col-md-6">
                            <select id="role" name="role" class="form-control" required>
                              <option value="Admin">Admin</option>
                              <option value="Captain">Captain</option>
                              <option value="Player">Player</option>
                            </select>
                          </div>
                        </div>

                        <div id="player" class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Player</label>
                          <div class="col-md-6">
                            <select name="player_id" class="form-control">
                              @foreach ($players as $player)
                                <option value="{{ $player->id }}">{{ $player->playerName }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div id="captain" class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right">Team</label>
                          <div class="col-md-6">
                            <select name="team_id" class="form-control">
                              @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function checkPlayerRole(){
    $("#player").css("display","none");
      $("#role").change(function(){
        if ($( "#role option:selected" ).val() == "Player" || $( "#role option:selected" ).val() == 'Captain' ) {
            $("#player").slideDown("fast"); //Slide Down Effect
        } else {
            $("#player").slideUp("fast");  //Slide Up Effect
        }
     });
});

$(document).ready(function checkCaptainRole(){
    $("#captain").css("display","none");
      $("#role").change(function(){
        if ($( "#role option:selected" ).val() == "Captain" ) {
            $("#captain").slideDown("fast"); //Slide Down Effect
        } else {
            $("#captain").slideUp("fast");  //Slide Up Effect
        }
     });
});
</script>
@endsection
