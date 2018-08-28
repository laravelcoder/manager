@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ss-list-channels.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.ss-list-channels.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $ss_list_channel->sync_server->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.ss-list-channels.fields.channel')</th>
                            <td field-key='channel'>{{ $ss_list_channel->channel->channel_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels-list.fields.channel-type')</th>
                            <td field-key='channel_type'>{{ isset($ss_list_channel->channel) ? $ss_list_channel->channel->channel_type : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ss_list_channels.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


