<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

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
