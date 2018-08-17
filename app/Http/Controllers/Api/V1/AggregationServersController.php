<?php

namespace App\Http\Controllers\Api\V1;

use App\AggregationServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAggregationServersRequest;
use App\Http\Requests\Admin\UpdateAggregationServersRequest;
use Yajra\DataTables\DataTables;

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
        

        return $aggregation_server;
    }

    public function store(StoreAggregationServersRequest $request)
    {
        $aggregation_server = AggregationServer::create($request->all());
        

        return $aggregation_server;
    }

    public function destroy($id)
    {
        $aggregation_server = AggregationServer::findOrFail($id);
        $aggregation_server->delete();
        return '';
    }
}
