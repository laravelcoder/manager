<?php

namespace App\Http\Controllers\Api\V1;

use App\VideoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVideoSettingsRequest;
use App\Http\Requests\Admin\UpdateVideoSettingsRequest;
use Yajra\DataTables\DataTables;

class VideoSettingsController extends Controller
{
    public function index()
    {
        return VideoSetting::all();
    }

    public function show($id)
    {
        return VideoSetting::findOrFail($id);
    }

    public function update(UpdateVideoSettingsRequest $request, $id)
    {
        $video_setting = VideoSetting::findOrFail($id);
        $video_setting->update($request->all());
        

        return $video_setting;
    }

    public function store(StoreVideoSettingsRequest $request)
    {
        $video_setting = VideoSetting::create($request->all());
        

        return $video_setting;
    }

    public function destroy($id)
    {
        $video_setting = VideoSetting::findOrFail($id);
        $video_setting->delete();
        return '';
    }
}
