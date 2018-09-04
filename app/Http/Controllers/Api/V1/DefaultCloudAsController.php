<?php

namespace App\Http\Controllers\Api\V1;

use App\DefaultCloudA;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDefaultCloudAsRequest;
use App\Http\Requests\Admin\UpdateDefaultCloudAsRequest;
use Yajra\DataTables\DataTables;

class DefaultCloudAsController extends Controller
{
    public function index()
    {
        return DefaultCloudA::all();
    }

    public function show($id)
    {
        return DefaultCloudA::findOrFail($id);
    }

    public function update(UpdateDefaultCloudAsRequest $request, $id)
    {
        $default_cloud_a = DefaultCloudA::findOrFail($id);
        $default_cloud_a->update($request->all());
        

        return $default_cloud_a;
    }

    public function store(StoreDefaultCloudAsRequest $request)
    {
        $default_cloud_a = DefaultCloudA::create($request->all());
        

        return $default_cloud_a;
    }

    public function destroy($id)
    {
        $default_cloud_a = DefaultCloudA::findOrFail($id);
        $default_cloud_a->delete();
        return '';
    }
}
