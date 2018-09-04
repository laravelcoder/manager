<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\DefaultCloudB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDefaultCloudBsRequest;
use App\Http\Requests\Admin\UpdateDefaultCloudBsRequest;

class DefaultCloudBsController extends Controller
{
    public function index()
    {
        return DefaultCloudB::all();
    }

    public function show($id)
    {
        return DefaultCloudB::findOrFail($id);
    }

    public function update(UpdateDefaultCloudBsRequest $request, $id)
    {
        $default_cloud_b = DefaultCloudB::findOrFail($id);
        $default_cloud_b->update($request->all());

        return $default_cloud_b;
    }

    public function store(StoreDefaultCloudBsRequest $request)
    {
        $default_cloud_b = DefaultCloudB::create($request->all());

        return $default_cloud_b;
    }

    public function destroy($id)
    {
        $default_cloud_b = DefaultCloudB::findOrFail($id);
        $default_cloud_b->delete();

        return '';
    }
}
