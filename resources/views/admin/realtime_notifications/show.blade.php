@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.realtime-notification.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.realtime-notification.fields.server-type')</th>
                            <td field-key='server_type'>{{ $realtime_notification->server_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                            <td field-key='r_urltn'>{{ $realtime_notification->r_urltn }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.realtime-notification.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $realtime_notification->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.realtime_notifications.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


