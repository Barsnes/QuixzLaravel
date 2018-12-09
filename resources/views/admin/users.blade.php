@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <table class="col-md-6">
    <tr>
      <th>Name</th>
      <th style="background-color:#ddd;">Email</th>
      <th>Role</th>
    </tr>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td style="background-color:#ddd;">{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
        </tr>
      @endforeach
  </table>
</div>
@endsection
