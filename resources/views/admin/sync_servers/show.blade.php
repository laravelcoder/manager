@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.sync-servers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.sync-servers.fields.name')</th>
                            <td field-key='name'>{{ $sync_server->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.sync-servers.fields.ss-host')</th>
                            <td field-key='ss_host'>{{ $sync_server->ss_host }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#ss_list_channels" aria-controls="ss_list_channels" role="tab" data-toggle="tab">SS list channels</a></li>
<li role="presentation" class=""><a href="#filters" aria-controls="filters" role="tab" data-toggle="tab">Filters</a></li>
<li role="presentation" class=""><a href="#general_settings" aria-controls="general_settings" role="tab" data-toggle="tab">General settings</a></li>
<li role="presentation" class=""><a href="#cs_list_channels" aria-controls="cs_list_channels" role="tab" data-toggle="tab">Cs list channels</a></li>
<li role="presentation" class=""><a href="#aggregation_server" aria-controls="aggregation_server" role="tab" data-toggle="tab">Aggregation Server</a></li>
<li role="presentation" class=""><a href="#baby_sync_servers" aria-controls="baby_sync_servers" role="tab" data-toggle="tab">Baby Sync Servers</a></li>
<li role="presentation" class=""><a href="#output_settings" aria-controls="output_settings" role="tab" data-toggle="tab">Output Settings</a></li>
<li role="presentation" class=""><a href="#realtime_notification" aria-controls="realtime_notification" role="tab" data-toggle="tab">Real-time Notification</a></li>
<li role="presentation" class=""><a href="#video_settings" aria-controls="video_settings" role="tab" data-toggle="tab">Video Settings</a></li>
<li role="presentation" class=""><a href="#ftp" aria-controls="ftp" role="tab" data-toggle="tab">FTP DETAILS</a></li>
<li role="presentation" class=""><a href="#report_settings" aria-controls="report_settings" role="tab" data-toggle="tab">Report settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="ss_list_channels">
<table class="table table-bordered table-striped {{ count($ss_list_channels) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.ss-list-channels.fields.sync-server')</th>
                        <th>@lang('global.ss-list-channels.fields.channel')</th>
                        <th>@lang('global.ss-list-channels.fields.channel-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($ss_list_channels) > 0)
            @foreach ($ss_list_channels as $ss_list_channel)
                <tr data-entry-id="{{ $ss_list_channel->id }}">
                    <td field-key='sync_server'>{{ $ss_list_channel->sync_server->name or '' }}</td>
                                <td field-key='channel'>{{ $ss_list_channel->channel->channel_name or '' }}</td>
                                <td field-key='channel_server'>{{ $ss_list_channel->channel_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ss_list_channels.restore', $ss_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ss_list_channels.perma_del', $ss_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('ss_list_channel_view')
                                    <a href="{{ route('admin.ss_list_channels.show',[$ss_list_channel->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('ss_list_channel_edit')
                                    <a href="{{ route('admin.ss_list_channels.edit',[$ss_list_channel->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('ss_list_channel_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ss_list_channels.destroy', $ss_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="filters">
<table class="table table-bordered table-striped {{ count($filters) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.filters.fields.name')</th>
                        <th>@lang('global.filters.fields.sync-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($filters) > 0)
            @foreach ($filters as $filter)
                <tr data-entry-id="{{ $filter->id }}">
                    <td field-key='name'>{{ $filter->name }}</td>
                                <td field-key='sync_server'>{{ $filter->sync_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.filters.restore', $filter->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.filters.perma_del', $filter->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('filter_view')
                                    <a href="{{ route('admin.filters.show',[$filter->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('filter_edit')
                                    <a href="{{ route('admin.filters.edit',[$filter->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('filter_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.filters.destroy', $filter->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="general_settings">
<table class="table table-bordered table-striped {{ count($general_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.general-settings.fields.transcoding-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($general_settings) > 0)
            @foreach ($general_settings as $general_setting)
                <tr data-entry-id="{{ $general_setting->id }}">
                    <td field-key='transcoding_server'>{{ $general_setting->transcoding_server }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.restore', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.perma_del', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('general_setting_view')
                                    <a href="{{ route('admin.general_settings.show',[$general_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('general_setting_edit')
                                    <a href="{{ route('admin.general_settings.edit',[$general_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('general_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.general_settings.destroy', $general_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="cs_list_channels">
<table class="table table-bordered table-striped {{ count($cs_list_channels) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cs-list-channels.fields.channel')</th>
                        <th>@lang('global.cs-list-channels.fields.channelserver')</th>
                        <th>@lang('global.cs-list-channels.fields.sync-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($cs_list_channels) > 0)
            @foreach ($cs_list_channels as $cs_list_channel)
                <tr data-entry-id="{{ $cs_list_channel->id }}">
                    <td field-key='channel'>{{ $cs_list_channel->channel->channel_name or '' }}</td>
                                <td field-key='channelserver'>{{ $cs_list_channel->channelserver->name or '' }}</td>
                                <td field-key='sync_server'>{{ $cs_list_channel->sync_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.cs_list_channels.restore', $cs_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.cs_list_channels.perma_del', $cs_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('cs_list_channel_view')
                                    <a href="{{ route('admin.cs_list_channels.show',[$cs_list_channel->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('cs_list_channel_edit')
                                    <a href="{{ route('admin.cs_list_channels.edit',[$cs_list_channel->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('cs_list_channel_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.cs_list_channels.destroy', $cs_list_channel->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="aggregation_server">
<table class="table table-bordered table-striped {{ count($aggregation_servers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.aggregation-server.fields.server-name')</th>
                        <th>@lang('global.aggregation-server.fields.server-host')</th>
                        <th>@lang('global.aggregation-server.fields.sync-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($aggregation_servers) > 0)
            @foreach ($aggregation_servers as $aggregation_server)
                <tr data-entry-id="{{ $aggregation_server->id }}">
                    <td field-key='server_name'>{{ $aggregation_server->server_name }}</td>
                                <td field-key='server_host'>{{ $aggregation_server->server_host }}</td>
                                <td field-key='sync_server'>{{ $aggregation_server->sync_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.aggregation_servers.restore', $aggregation_server->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.aggregation_servers.perma_del', $aggregation_server->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('aggregation_server_view')
                                    <a href="{{ route('admin.aggregation_servers.show',[$aggregation_server->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('aggregation_server_edit')
                                    <a href="{{ route('admin.aggregation_servers.edit',[$aggregation_server->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('aggregation_server_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.aggregation_servers.destroy', $aggregation_server->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="baby_sync_servers">
<table class="table table-bordered table-striped {{ count($baby_sync_servers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.baby-sync-servers.fields.baby-sync-server')</th>
                        <th>@lang('global.baby-sync-servers.fields.sync-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($baby_sync_servers) > 0)
            @foreach ($baby_sync_servers as $baby_sync_server)
                <tr data-entry-id="{{ $baby_sync_server->id }}">
                    <td field-key='baby_sync_server'>{{ $baby_sync_server->baby_sync_server }}</td>
                                <td field-key='sync_server'>{{ $baby_sync_server->sync_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.baby_sync_servers.restore', $baby_sync_server->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.baby_sync_servers.perma_del', $baby_sync_server->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('baby_sync_server_view')
                                    <a href="{{ route('admin.baby_sync_servers.show',[$baby_sync_server->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('baby_sync_server_edit')
                                    <a href="{{ route('admin.baby_sync_servers.edit',[$baby_sync_server->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('baby_sync_server_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.baby_sync_servers.destroy', $baby_sync_server->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="output_settings">
<table class="table table-bordered table-striped {{ count($output_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.output-settings.fields.report-time')</th>
                        <th>@lang('global.output-settings.fields.email')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($output_settings) > 0)
            @foreach ($output_settings as $output_setting)
                <tr data-entry-id="{{ $output_setting->id }}">
                    <td field-key='report_time'>{{ $output_setting->report_time }}</td>
                                <td field-key='email'>{{ $output_setting->email->email or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.restore', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.perma_del', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('output_setting_view')
                                    <a href="{{ route('admin.output_settings.show',[$output_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('output_setting_edit')
                                    <a href="{{ route('admin.output_settings.edit',[$output_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('output_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.output_settings.destroy', $output_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="realtime_notification">
<table class="table table-bordered table-striped {{ count($realtime_notifications) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.realtime-notification.fields.server-type')</th>
                        <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($realtime_notifications) > 0)
            @foreach ($realtime_notifications as $realtime_notification)
                <tr data-entry-id="{{ $realtime_notification->id }}">
                    <td field-key='server_type'>{{ $realtime_notification->server_type }}</td>
                                <td field-key='r_urltn'>{{ $realtime_notification->r_urltn }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.restore', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.perma_del', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('realtime_notification_view')
                                    <a href="{{ route('admin.realtime_notifications.show',[$realtime_notification->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('realtime_notification_edit')
                                    <a href="{{ route('admin.realtime_notifications.edit',[$realtime_notification->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('realtime_notification_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.realtime_notifications.destroy', $realtime_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="video_settings">
<table class="table table-bordered table-striped {{ count($video_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.video-settings.fields.server-url')</th>
                        <th>@lang('global.video-settings.fields.server-redirect')</th>
                        <th>@lang('global.video-settings.fields.hls')</th>
                        <th>@lang('global.video-settings.fields.sync-server')</th>
                        <th>@lang('global.video-settings.fields.video-server-type')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($video_settings) > 0)
            @foreach ($video_settings as $video_setting)
                <tr data-entry-id="{{ $video_setting->id }}">
                    <td field-key='server_url'>{{ $video_setting->server_url }}</td>
                                <td field-key='server_redirect'>{{ $video_setting->server_redirect }}</td>
                                <td field-key='hls'>{{ $video_setting->hls }}</td>
                                <td field-key='sync_server'>{{ $video_setting->sync_server->name or '' }}</td>
                                <td field-key='video_server_type'>{{ $video_setting->video_server_type->server_type or '' }}</td>
                                                                <td>
                                    @can('video_setting_view')
                                    <a href="{{ route('admin.video_settings.show',[$video_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('video_setting_edit')
                                    <a href="{{ route('admin.video_settings.edit',[$video_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('video_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.video_settings.destroy', $video_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="ftp">
<table class="table table-bordered table-striped {{ count($ftps) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.ftp.fields.ftp-server')</th>
                        <th>@lang('global.ftp.fields.ftp-directory')</th>
                        <th>@lang('global.ftp.fields.ftp-username')</th>
                        <th>@lang('global.ftp.fields.ftp-password')</th>
                        <th>@lang('global.ftp.fields.grab-time')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($ftps) > 0)
            @foreach ($ftps as $ftp)
                <tr data-entry-id="{{ $ftp->id }}">
                    <td field-key='ftp_server'>{{ $ftp->ftp_server }}</td>
                                <td field-key='ftp_directory'>{{ $ftp->ftp_directory }}</td>
                                <td field-key='ftp_username'>{{ $ftp->ftp_username }}</td>
                                <td>---</td>
                                <td field-key='grab_time'>{{ $ftp->grab_time }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.restore', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.perma_del', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('ftp_view')
                                    <a href="{{ route('admin.ftps.show',[$ftp->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('ftp_edit')
                                    <a href="{{ route('admin.ftps.edit',[$ftp->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('ftp_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.ftps.destroy', $ftp->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="report_settings">
<table class="table table-bordered table-striped {{ count($report_settings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.report-settings.fields.millisecond-precision')</th>
                        <th>@lang('global.report-settings.fields.show-channel-button')</th>
                        <th>@lang('global.report-settings.fields.show-clip-button')</th>
                        <th>@lang('global.report-settings.fields.show-group-button')</th>
                        <th>@lang('global.report-settings.fields.show-live-button')</th>
                        <th>@lang('global.report-settings.fields.enable-evt')</th>
                        <th>@lang('global.report-settings.fields.enable-excel')</th>
                        <th>@lang('global.report-settings.fields.enable-evt-timing')</th>
                        <th>@lang('global.report-settings.fields.timezone')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($report_settings) > 0)
            @foreach ($report_settings as $report_setting)
                <tr data-entry-id="{{ $report_setting->id }}">
                    <td field-key='millisecond_precision'>{{ Form::checkbox("millisecond_precision", 1, $report_setting->millisecond_precision == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_channel_button'>{{ Form::checkbox("show_channel_button", 1, $report_setting->show_channel_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_clip_button'>{{ Form::checkbox("show_clip_button", 1, $report_setting->show_clip_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_group_button'>{{ Form::checkbox("show_group_button", 1, $report_setting->show_group_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='show_live_button'>{{ Form::checkbox("show_live_button", 1, $report_setting->show_live_button == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_evt'>{{ Form::checkbox("enable_evt", 1, $report_setting->enable_evt == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_excel'>{{ Form::checkbox("enable_excel", 1, $report_setting->enable_excel == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='enable_evt_timing'>{{ Form::checkbox("enable_evt_timing", 1, $report_setting->enable_evt_timing == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='timezone'>{{ $report_setting->timezone }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.restore', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.perma_del', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('report_setting_view')
                                    <a href="{{ route('admin.report_settings.show',[$report_setting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('report_setting_edit')
                                    <a href="{{ route('admin.report_settings.edit',[$report_setting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('report_setting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.report_settings.destroy', $report_setting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.sync_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


