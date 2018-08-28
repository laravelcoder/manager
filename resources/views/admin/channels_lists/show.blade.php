@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channels-list.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.channels-list.fields.channel-name')</th>
                            <td field-key='channel_name'>{{ $channels_list->channel_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channels-list.fields.channel-type')</th>
                            <td field-key='channel_type'>{{ $channels_list->channel_type }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#cs_list_channels" aria-controls="cs_list_channels" role="tab" data-toggle="tab">Cs list channels</a></li>
<li role="presentation" class=""><a href="#csi" aria-controls="csi" role="tab" data-toggle="tab">Channel Server Inputs</a></li>

<li role="presentation" class=""><a href="#ss_list_channels" aria-controls="ss_list_channels" role="tab" data-toggle="tab">SS list channels</a></li>

<li role="presentation" class=""><a href="#channel_server" aria-controls="channel_server" role="tab" data-toggle="tab">Channel Server</a></li>
<li role="presentation" class=""><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="cs_list_channels">
<table class="table table-bordered table-striped {{ count($cs_list_channels) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cs-list-channels.fields.channel')</th>
                        <th>@lang('global.cs-list-channels.fields.channelserver')</th>
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
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="csi">
<table class="table table-bordered table-striped {{ count($csis) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.csi.fields.channel-server')</th>
                        <th>@lang('global.csi.fields.channel')</th>
                        <th>@lang('global.csi.fields.protocol')</th>
                        <th>@lang('global.csi.fields.url')</th>
                        <th>@lang('global.csi.fields.ssm')</th>
                        <th>@lang('global.csi.fields.imc')</th>
                        <th>@lang('global.csi.fields.ip')</th>
                        <th>@lang('global.csi.fields.pid')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($csis) > 0)
            @foreach ($csis as $csi)
                <tr data-entry-id="{{ $csi->id }}">
                    <td field-key='channel_server'>{{ $csi->channel_server->name or '' }}</td>
                                <td field-key='channel'>{{ $csi->channel->channel_name or '' }}</td>
                                <td field-key='protocol'>{{ $csi->protocol->protocol or '' }}</td>
                                <td field-key='url'>{{ $csi->url }}</td>
                                <td field-key='ssm'>{{ $csi->ssm }}</td>
                                <td field-key='imc'>{{ $csi->imc }}</td>
                                <td field-key='ip'>{{ $csi->ip }}</td>
                                <td field-key='pid'>{{ $csi->pid }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csis.restore', $csi->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csis.perma_del', $csi->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('csi_view')
                                    <a href="{{ route('admin.csis.show',[$csi->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('csi_edit')
                                    <a href="{{ route('admin.csis.edit',[$csi->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('csi_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csis.destroy', $csi->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="13">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
 
<div role="tabpanel" class="tab-pane " id="ss_list_channels">
<table class="table table-bordered table-striped {{ count($ss_list_channels) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.ss-list-channels.fields.sync-server')</th>
                        <th>@lang('global.ss-list-channels.fields.channel')</th>
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
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
 
<div role="tabpanel" class="tab-pane " id="channel_server">
<table class="table table-bordered table-striped {{ count($channel_servers) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.channel-server.fields.name')</th>
                        <th>@lang('global.channel-server.fields.cs-host')</th>
                        <th>@lang('global.channel-server.fields.channel')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($channel_servers) > 0)
            @foreach ($channel_servers as $channel_server)
                <tr data-entry-id="{{ $channel_server->id }}">
                    <td field-key='name'>{{ $channel_server->name }}</td>
                                <td field-key='cs_host'>{{ $channel_server->cs_host }}</td>
                                <td field-key='channel'>
                                    @foreach ($channel_server->channel as $singleChannel)
                                        <span class="label label-info label-many">{{ $singleChannel->channel_name }}</span>
                                    @endforeach
                                </td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.restore', $channel_server->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.perma_del', $channel_server->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('channel_server_view')
                                    <a href="{{ route('admin.channel_servers.show',[$channel_server->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('channel_server_edit')
                                    <a href="{{ route('admin.channel_servers.edit',[$channel_server->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('channel_server_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.channel_servers.destroy', $channel_server->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="cso">
<table class="table table-bordered table-striped {{ count($csos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cso.fields.ocloud-a')</th>
                        <th>@lang('global.cso.fields.ocp-a')</th>
                        <th>@lang('global.cso.fields.ocloud-b')</th>
                        <th>@lang('global.cso.fields.ocp-b')</th>
                        <th>@lang('global.cso.fields.channel')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($csos) > 0)
            @foreach ($csos as $cso)
                <tr data-entry-id="{{ $cso->id }}">
                    <td field-key='ocloud_a'>{{ $cso->ocloud_a }}</td>
                                <td field-key='ocp_a'>{{ $cso->ocp_a }}</td>
                                <td field-key='ocloud_b'>{{ $cso->ocloud_b }}</td>
                                <td field-key='ocp_b'>{{ $cso->ocp_b }}</td>
                                <td field-key='channel'>{{ $cso->channel->channel_name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.restore', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.perma_del', $cso->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('cso_view')
                                    <a href="{{ route('admin.csos.show',[$cso->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('cso_edit')
                                    <a href="{{ route('admin.csos.edit',[$cso->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('cso_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.csos.destroy', $cso->id])) !!}
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.channels_lists.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


