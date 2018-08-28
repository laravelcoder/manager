<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\AggregationServer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAggregationServersRequest;
use App\Http\Requests\Admin\UpdateAggregationServersRequest;

class AggregationServersController extends Controller
{
    public function index()
    {
        return AggregationServer::all();
    }

    public function show($id)
    {
        return AggregationServer::findOrFail($id);
    }

    public function update(UpdateAggregationServersRequest $request, $id)
    {
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->update($request->all());

        $babySyncServers = $aggregation_server->baby_sync_servers;
        $currentBabySyncServerData = [];
        foreach ($request->input('baby_sync_servers', []) as $index => $data) {
            if (is_int($index)) {
                $aggregation_server->baby_sync_servers()->create($data);
            } else {
                $id = explode('-', $index)[1];
                $currentBabySyncServerData[$id] = $data;
            }
        }
        foreach ($babySyncServers as $item) {
            if (isset($currentBabySyncServerData[$item->id])) {
                $item->update($currentBabySyncServerData[$item->id]);
            } else {
                $item->delete();
            }
        }

        return $aggregation_server;
    }

    public function store(StoreAggregationServersRequest $request)
    {
        $aggregation_server = AggregationServer::create($request->all());

        foreach ($request->input('baby_sync_servers', []) as $data) {
            $aggregation_server->baby_sync_servers()->create($data);
        }

        return $aggregation_server;
    }

    public function destroy($id)
    {
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->delete();

        return '';
    }
}
