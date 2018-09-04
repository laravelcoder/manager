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
        
        $defaultCloudAs           = $channel_server->default_cloud_as;
        $currentDefaultCloudAData = [];
        foreach ($request->input('default_cloud_as', []) as $index => $data) {
            if (is_integer($index)) {
                $channel_server->default_cloud_as()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentDefaultCloudAData[$id] = $data;
            }
        }
        foreach ($defaultCloudAs as $item) {
            if (isset($currentDefaultCloudAData[$item->id])) {
                $item->update($currentDefaultCloudAData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $defaultCloudBs           = $channel_server->default_cloud_bs;
        $currentDefaultCloudBData = [];
        foreach ($request->input('default_cloud_bs', []) as $index => $data) {
            if (is_integer($index)) {
                $channel_server->default_cloud_bs()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentDefaultCloudBData[$id] = $data;
            }
        }
        foreach ($defaultCloudBs as $item) {
            if (isset($currentDefaultCloudBData[$item->id])) {
                $item->update($currentDefaultCloudBData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $localOutputs           = $channel_server->local_outputs;
        $currentLocalOutputData = [];
        foreach ($request->input('local_outputs', []) as $index => $data) {
            if (is_integer($index)) {
                $channel_server->local_outputs()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentLocalOutputData[$id] = $data;
            }
        }
        foreach ($localOutputs as $item) {
            if (isset($currentLocalOutputData[$item->id])) {
                $item->update($currentLocalOutputData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $channel_server;
    }

    public function store(StoreChannelServersRequest $request)
    {
        $channel_server = ChannelServer::create($request->all());
        
        foreach ($request->input('default_cloud_as', []) as $data) {
            $channel_server->default_cloud_as()->create($data);
        }
        foreach ($request->input('default_cloud_bs', []) as $data) {
            $channel_server->default_cloud_bs()->create($data);
        }
        foreach ($request->input('local_outputs', []) as $data) {
            $channel_server->local_outputs()->create($data);
        }

        return $channel_server;
    }

    public function destroy($id)
    {
        $channel_server = ChannelServer::findOrFail($id);
        $channel_server->delete();
        return '';
    }
}
