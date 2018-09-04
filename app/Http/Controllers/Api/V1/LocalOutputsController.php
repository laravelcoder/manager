<?php

namespace App\Http\Controllers\Api\V1;

use App\LocalOutput;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLocalOutputsRequest;
use App\Http\Requests\Admin\UpdateLocalOutputsRequest;
use Yajra\DataTables\DataTables;

class LocalOutputsController extends Controller
{
    public function index()
    {
        return LocalOutput::all();
    }

    public function show($id)
    {
        return LocalOutput::findOrFail($id);
    }

    public function update(UpdateLocalOutputsRequest $request, $id)
    {
        $local_output = LocalOutput::findOrFail($id);
        $local_output->update($request->all());
        

        return $local_output;
    }

    public function store(StoreLocalOutputsRequest $request)
    {
        $local_output = LocalOutput::create($request->all());
        

        return $local_output;
    }

    public function destroy($id)
    {
        $local_output = LocalOutput::findOrFail($id);
        $local_output->delete();
        return '';
    }
}
