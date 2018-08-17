<?php

namespace App\Http\Controllers\Api\V1;

use App\CsChannelList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsChannelListsRequest;
use App\Http\Requests\Admin\UpdateCsChannelListsRequest;
use Yajra\DataTables\DataTables;

class CsChannelListsController extends Controller
{
    public function index()
    {
        return CsChannelList::all();
    }

    public function show($id)
    {
        return CsChannelList::findOrFail($id);
    }

    public function update(UpdateCsChannelListsRequest $request, $id)
    {
        $cs_channel_list = CsChannelList::findOrFail($id);
        $cs_channel_list->update($request->all());
        

        return $cs_channel_list;
    }

    public function store(StoreCsChannelListsRequest $request)
    {
        $cs_channel_list = CsChannelList::create($request->all());
        

        return $cs_channel_list;
    }

    public function destroy($id)
    {
        $cs_channel_list = CsChannelList::findOrFail($id);
        $cs_channel_list->delete();
        return '';
    }
}