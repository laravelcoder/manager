@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.default-cloud-a.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.default-cloud-a.fields.address')</th>
                            <td field-key='address'>{{ $default_cloud_a->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.default-cloud-a.fields.port')</th>
                            <td field-key='port'>{{ $default_cloud_a->port }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.default-cloud-a.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $default_cloud_a->channel_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.default_cloud_as.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


