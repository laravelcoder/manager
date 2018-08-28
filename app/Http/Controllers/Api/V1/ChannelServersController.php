<?php

namespace App\Http\Controllers\Api\V1;

use App\ChannelServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;
use Yajra\DataTables\DataTables;

class ChannelServersController extends Controller
{
    public function index()
    {
        return ChannelServer::all();
    }

    public function show($id)
    {
        return ChannelServer::findOrFail($id);
    }

    public function update(UpdateChannelServersRequest $request, $id)
    {
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->update($request->all());
        

        return $channel_server;
    }

    public function store(StoreChannelServersRequest $request)
    {
        $channel_server = ChannelServer::create($request->all());
        

        return $channel_server;
    }

    public function destroy($id)
    {
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();
        return '';
    }
}
