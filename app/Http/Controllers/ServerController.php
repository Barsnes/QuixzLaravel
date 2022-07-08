<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $this->validate($request, [
            'title' => 'required|max:20',
            'serverIp' => 'required',
        ]);

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
        $this->validate($request, [
            'title' => 'required|max:20',
            'serverIp' => 'required',
        ]);
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
