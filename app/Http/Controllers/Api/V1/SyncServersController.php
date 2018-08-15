<?php

namespace App\Http\Controllers\Api\V1;

use App\SyncServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSyncServersRequest;
use App\Http\Requests\Admin\UpdateSyncServersRequest;
use Yajra\DataTables\DataTables;

class SyncServersController extends Controller
{
    public function index()
    {
        return SyncServer::all();
    }

    public function show($id)
    {
        return SyncServer::findOrFail($id);
    }

    public function update(UpdateSyncServersRequest $request, $id)
    {
        $sync_server = SyncServer::findOrFail($id);
        $sync_server->update($request->all());
        

        return $sync_server;
    }

    public function store(StoreSyncServersRequest $request)
    {
        $sync_server = SyncServer::create($request->all());
        

        return $sync_server;
    }

    public function destroy($id)
    {
        $sync_server = SyncServer::findOrFail($id);
        $sync_server->delete();
        return '';
    }
}
