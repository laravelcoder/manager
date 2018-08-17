<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Api\V1;

use App\ChannelServer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelServersRequest;
use App\Http\Requests\Admin\UpdateChannelServersRequest;

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

        $csChannelLists = $channel_server->cs_channel_lists;
        $currentCsChannelListData = [];
        foreach ($request->input('cs_channel_lists', []) as $index => $data) {
            if (is_int($index)) {
                $channel_server->cs_channel_lists()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentCsChannelListData[$id] = $data;
            }
        }
        foreach ($csChannelLists as $item) {
            if (isset($currentCsChannelListData[$item->id])) {
                $item->update($currentCsChannelListData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $channel_server;
    }

    public function store(StoreChannelServersRequest $request)
    {
        $channel_server = ChannelServer::create($request->all());

        foreach ($request->input('cs_channel_lists', []) as $data) {
            $channel_server->cs_channel_lists()->create($data);
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
