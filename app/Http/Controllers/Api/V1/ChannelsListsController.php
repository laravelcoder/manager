<?php

namespace App\Http\Controllers\Api\V1;

use App\ChannelsList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChannelsListsRequest;
use App\Http\Requests\Admin\UpdateChannelsListsRequest;
use Yajra\DataTables\DataTables;

class ChannelsListsController extends Controller
{
    public function index()
    {
        return ChannelsList::all();
    }

    public function show($id)
    {
        return ChannelsList::findOrFail($id);
    }

    public function update(UpdateChannelsListsRequest $request, $id)
    {
        $channels_list = ChannelsList::findOrFail($id);
        $channels_list->update($request->all());
        
        $csListChannels           = $channels_list->cs_list_channels;
        $currentCsListChannelData = [];
        foreach ($request->input('cs_list_channels', []) as $index => $data) {
            if (is_integer($index)) {
                $channels_list->cs_list_channels()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentCsListChannelData[$id] = $data;
            }
        }
        foreach ($csListChannels as $item) {
            if (isset($currentCsListChannelData[$item->id])) {
                $item->update($currentCsListChannelData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $channels_list;
    }

    public function store(StoreChannelsListsRequest $request)
    {
        $channels_list = ChannelsList::create($request->all());
        
        foreach ($request->input('cs_list_channels', []) as $data) {
            $channels_list->cs_list_channels()->create($data);
        }

        return $channels_list;
    }

    public function destroy($id)
    {
        $channels_list = ChannelsList::findOrFail($id);
        $channels_list->delete();
        return '';
    }
}
