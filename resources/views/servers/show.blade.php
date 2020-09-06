@extends('layouts.default')

@section('title')
Servers
@endsection

@section('content')

  <div class="server">
      <h4>Servers</h4>

    @foreach ($servers as $server)
        <div class="server_content">
          <iframe src="https://cache.gametracker.com/components/html0/?host={{ $server->server }}&bgColor=F8B52A&fontColor=000000&titleBgColor=121219&titleColor=FFFFFF&borderColor=F9B633&linkColor=FFFFFF&borderLinkColor=222222&showMap=1&showCurrPlayers=0&showTopPlayers=0&showBlogs=0&width=240" frameborder="0" scrolling="no" width="240" height="288"></iframe>
          <h2>IP: {{ $server->server }}</h2>
        </div>
    @endforeach

  </div>
@endsection
