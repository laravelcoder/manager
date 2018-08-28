<?php

namespace App\Http\Controllers\Api\V1;

use App\VideoServerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVideoServerTypesRequest;
use App\Http\Requests\Admin\UpdateVideoServerTypesRequest;
use Yajra\DataTables\DataTables;

class VideoServerTypesController extends Controller
{
    public function index()
    {
        return VideoServerType::all();
    }

    public function show($id)
    {
        return VideoServerType::findOrFail($id);
    }

    public function update(UpdateVideoServerTypesRequest $request, $id)
    {
        $video_server_type = VideoServerType::findOrFail($id);
        $video_server_type->update($request->all());
        

        return $video_server_type;
    }

    public function store(StoreVideoServerTypesRequest $request)
    {
        $video_server_type = VideoServerType::create($request->all());
        

        return $video_server_type;
    }

    public function destroy($id)
    {
        $video_server_type = VideoServerType::findOrFail($id);
        $video_server_type->delete();
        return '';
    }
}
