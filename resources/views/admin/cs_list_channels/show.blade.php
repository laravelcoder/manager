@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cs-list-channels.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.cs-list-channels.fields.channel')</th>
                            <td field-key='channel'>{{ $cs_list_channel->channel->channel_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels-list.fields.channel-type')</th>
                            <td field-key='channel_type'>{{ isset($cs_list_channel->channel) ? $cs_list_channel->channel->channel_type : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cs-list-channels.fields.channelserver')</th>
                            <td field-key='channelserver'>{{ $cs_list_channel->channelserver->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cs-list-channels.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $cs_list_channel->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.cs_list_channels.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


