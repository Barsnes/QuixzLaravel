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

                    You are logged in
                    @if($role == 'Admin')
                      as an admin

                      <div class="col-md-12">
                        <a href="register"> <h1>Register new account</h1></a>
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
