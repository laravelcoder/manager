@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baby-sync-servers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.baby-sync-servers.fields.baby-sync-server')</th>
                            <td field-key='baby_sync_server'>{{ $baby_sync_server->baby_sync_server }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.baby-sync-servers.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $baby_sync_server->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.baby_sync_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


