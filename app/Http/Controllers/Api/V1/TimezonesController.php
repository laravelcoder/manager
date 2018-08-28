<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Timezone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimezonesRequest;
use App\Http\Requests\Admin\UpdateTimezonesRequest;

class TimezonesController extends Controller
{
    public function index()
    {
        return Timezone::all();
    }

    public function show($id)
    {
        return Timezone::findOrFail($id);
    }

    public function update(UpdateTimezonesRequest $request, $id)
    {
        $timezone = Timezone::findOrFail($id);
        $timezone->update($request->all());

        return $timezone;
    }

    public function store(StoreTimezonesRequest $request)
    {
        $timezone = Timezone::create($request->all());

        return $timezone;
    }

    public function destroy($id)
    {
        $timezone = Timezone::findOrFail($id);
        $timezone->delete();

        return '';
    }
}
