<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Sponsor;

class ServerController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  // Show Servers
  public function servers(){
    $servers = Server::get();
    $sponsors = Sponsor::get();

    return view('servers.show')->withServers($servers)->withSponsors($sponsors);
  }

    public function index()
    {
      $servers = Server::get();
      return view('admin.servers')->withServers($servers);
    }

    public function create()
    {
      return view('servers.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, array(
          'title' => 'required|max:20',
          'serverIp' => 'required',
        ));

        $newServer = new Server;

        $newServer->title = $request->title;
        $newServer->server = $request->serverIp;

        $newServer->save();

        return redirect('/admin/servers');
    }

    public function show(Server $server)
    {
        //
    }

    public function edit(Server $server)
    {
      $server = Server::find($server->id);

      return view('servers.edit')->withServer($server);
    }

    public function update(Request $request, Server $server)
    {
      $this->validate($request, array(
          'title' => 'required|max:20',
          'serverIp' => 'required',
        ));
        $newServer = Server::find($server->id);

        $newServer->title = $request->title;
        $newServer->server = $request->serverIp;

        $newServer->save();

        return redirect('/admin/servers');
    }

    public function destroy(Server $server)
    {
      $delServer = Server::find($server->id);

      $delServer->delete();
      return redirect('/admin/servers');
    }
}
