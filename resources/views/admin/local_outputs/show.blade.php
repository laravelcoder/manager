@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.local-output.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.local-output.fields.address')</th>
                            <td field-key='address'>{{ $local_output->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.local-output.fields.port')</th>
                            <td field-key='port'>{{ $local_output->port }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.local-output.fields.channel-server')</th>
                            <td field-key='channel_server'>{{ $local_output->channel_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.local_outputs.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


