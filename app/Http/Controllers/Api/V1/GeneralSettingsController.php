<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGeneralSettingsRequest;
use App\Http\Requests\Admin\UpdateGeneralSettingsRequest;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        return GeneralSetting::all();
    }

    public function show($id)
    {
        return GeneralSetting::findOrFail($id);
    }

    public function update(UpdateGeneralSettingsRequest $request, $id)
    {
        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->update($request->all());

        return $general_setting;
    }

    public function store(StoreGeneralSettingsRequest $request)
    {
        $general_setting = GeneralSetting::create($request->all());

        return $general_setting;
    }

    public function destroy($id)
    {
        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->delete();

        return '';
    }
}
