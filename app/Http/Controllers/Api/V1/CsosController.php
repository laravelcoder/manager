<?php

namespace App\Http\Controllers\Api\V1;

use App\Cso;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCsosRequest;
use App\Http\Requests\Admin\UpdateCsosRequest;

class CsosController extends Controller
{
    public function index()
    {
        return Cso::all();
    }

    public function show($id)
    {
        return Cso::findOrFail($id);
    }

    public function update(UpdateCsosRequest $request, $id)
    {
        $cso = Cso::findOrFail($id);
        $cso->update($request->all());

        return $cso;
    }

    public function store(StoreCsosRequest $request)
    {
        $cso = Cso::create($request->all());

        return $cso;
    }

    public function destroy($id)
    {
        $cso = Cso::findOrFail($id);
        $cso->delete();

        return '';
    }
}
