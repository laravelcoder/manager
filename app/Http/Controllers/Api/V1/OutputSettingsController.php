<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Api\V1;

use App\OutputSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOutputSettingsRequest;
use App\Http\Requests\Admin\UpdateOutputSettingsRequest;

class OutputSettingsController extends Controller
{
    public function index()
    {
        return OutputSetting::all();
    }

    public function show($id)
    {
        return OutputSetting::findOrFail($id);
    }

    public function update(UpdateOutputSettingsRequest $request, $id)
    {
        $output_setting = OutputSetting::findOrFail($id);
        $output_setting->update($request->all());

        return $output_setting;
    }

    public function store(StoreOutputSettingsRequest $request)
    {
        $output_setting = OutputSetting::create($request->all());

        return $output_setting;
    }

    public function destroy($id)
    {
        $output_setting = OutputSetting::findOrFail($id);
        $output_setting->delete();

        return '';
    }
}
