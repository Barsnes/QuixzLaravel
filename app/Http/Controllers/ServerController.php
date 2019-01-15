<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
  // Show Servers
  public function servers(){
    $servers = Server::get();
    return view('servers.show')->withServers($servers);
  }

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Server $server)
    {
        //
    }

    public function edit(Server $server)
    {
        //
    }

    public function update(Request $request, Server $server)
    {
        //
    }

    public function destroy(Server $server)
    {
        //
    }
}
