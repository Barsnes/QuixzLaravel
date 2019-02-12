@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <table class="col-md-6">
    <tr>
      <th style="padding-bottom: .5rem">Name</th>
      <th style="background-color:#ddd; color: #000;padding-bottom: .5rem">Email</th>
      <th style="padding-bottom: .5rem">Role</th>
    </tr>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          <td style="background-color:#ddd; color: #000">{{ $user->email }}</td>
          <td>{{ $user->role }}</td>
        </tr>
      @endforeach
  </table>
</div>
@endsection
