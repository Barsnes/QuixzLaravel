@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as {{ $role }}
                    @if($role == 'Admin')
                      as an admin <br>

                      <div class="col-md-8">
                        <ul>
                          <li><a href="/register"><h3>Register new account</h3></a></li>
                          <li><a href="/admin/news/create"><h3>Create a new news post</h3></a></li>
                        </ul>
                      </div>

                      <div class="">

                      </div>
                    @endif


                    @if($role == 'Player')
                      as a player
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
