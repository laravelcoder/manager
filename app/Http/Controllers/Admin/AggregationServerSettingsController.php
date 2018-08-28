<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class AggregationServerSettingsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('aggregation_server_setting_access')) {
            return abort(401);
        }
        return view('admin.aggregation_server_settings.index');
    }
}
