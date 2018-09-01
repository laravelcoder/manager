@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.channel-server.fields.name')</th>
                            <td field-key='name'>{{ $channel_server->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.cs-host')</th>
                            <td field-key='cs_host'>{{ $channel_server->cs_host }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.channel-server.fields.channel')</th>
                            <td field-key='channel'>
                                @foreach ($channel_server->channel as $singleChannel)
                                    <span class="label label-info label-many">{{ $singleChannel->channel_name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#csi" aria-controls="csi" role="tab" data-toggle="tab">Channel Server Inputs</a></li>
<li role="presentation" class=""><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
<li role="presentation" class=""><a href="#cs_list_channels" aria-controls="cs_list_channels" role="tab" data-toggle="tab">Cs list channels</a></li>
<li role="presentation" class=""><a href="#ss_list_channels" aria-controls="ss_list_channels" role="tab" data-toggle="tab">SS list channels</a></li>
<li role="presentation" class=""><a href="#default_cloud_a" aria-controls="default_cloud_a" role="tab" data-toggle="tab">Default Cloud A</a></li>
<li role="presentation" class=""><a href="#default_cloud_b" aria-controls="default_cloud_b" role="tab" data-toggle="tab">Default Cloud B</a></li>
<li role="presentation" class=""><a href="#local_output" aria-controls="local_output" role="tab" data-toggle="tab">Local Output</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="csi">
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
<div role="tabpanel" class="tab-pane " id="cso">
<table class="table table-bordered table-striped {{ count($csos) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.cso.fields.channel')</th>
                        <th>@lang('global.cso.fields.ocloud-a')</th>
                        <th>@lang('global.cso.fields.ocp-a')</th>
                        <th>@lang('global.cso.fields.ocloud-b')</th>
                        <th>@lang('global.cso.fields.ocp-b')</th>
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
                    <td field-key='channel'>{{ $cso->channel->channel_name or '' }}</td>
                                <td field-key='ocloud_a'>{{ $cso->ocloud_a }}</td>
                                <td field-key='ocp_a'>{{ $cso->ocp_a }}</td>
                                <td field-key='ocloud_b'>{{ $cso->ocloud_b }}</td>
                                <td field-key='ocp_b'>{{ $cso->ocp_b }}</td>
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
<div role="tabpanel" class="tab-pane " id="ss_list_channels">
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
<div role="tabpanel" class="tab-pane " id="default_cloud_a">
<table class="table table-bordered table-striped {{ count($default_cloud_as) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.default-cloud-a.fields.address')</th>
                        <th>@lang('global.default-cloud-a.fields.port')</th>
                        <th>@lang('global.default-cloud-a.fields.channel-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($default_cloud_as) > 0)
            @foreach ($default_cloud_as as $default_cloud_a)
                <tr data-entry-id="{{ $default_cloud_a->id }}">
                    <td field-key='address'>{{ $default_cloud_a->address }}</td>
                                <td field-key='port'>{{ $default_cloud_a->port }}</td>
                                <td field-key='channel_server'>{{ $default_cloud_a->channel_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_as.restore', $default_cloud_a->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_as.perma_del', $default_cloud_a->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('default_cloud_a_view')
                                    <a href="{{ route('admin.default_cloud_as.show',[$default_cloud_a->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('default_cloud_a_edit')
                                    <a href="{{ route('admin.default_cloud_as.edit',[$default_cloud_a->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('default_cloud_a_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_as.destroy', $default_cloud_a->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="default_cloud_b">
<table class="table table-bordered table-striped {{ count($default_cloud_bs) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.default-cloud-b.fields.address')</th>
                        <th>@lang('global.default-cloud-b.fields.port')</th>
                        <th>@lang('global.default-cloud-b.fields.channel-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($default_cloud_bs) > 0)
            @foreach ($default_cloud_bs as $default_cloud_b)
                <tr data-entry-id="{{ $default_cloud_b->id }}">
                    <td field-key='address'>{{ $default_cloud_b->address }}</td>
                                <td field-key='port'>{{ $default_cloud_b->port }}</td>
                                <td field-key='channel_server'>{{ $default_cloud_b->channel_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_bs.restore', $default_cloud_b->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_bs.perma_del', $default_cloud_b->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('default_cloud_b_view')
                                    <a href="{{ route('admin.default_cloud_bs.show',[$default_cloud_b->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('default_cloud_b_edit')
                                    <a href="{{ route('admin.default_cloud_bs.edit',[$default_cloud_b->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('default_cloud_b_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.default_cloud_bs.destroy', $default_cloud_b->id])) !!}
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
<div role="tabpanel" class="tab-pane " id="local_output">
<table class="table table-bordered table-striped {{ count($local_outputs) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.local-output.fields.address')</th>
                        <th>@lang('global.local-output.fields.port')</th>
                        <th>@lang('global.local-output.fields.channel-server')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($local_outputs) > 0)
            @foreach ($local_outputs as $local_output)
                <tr data-entry-id="{{ $local_output->id }}">
                    <td field-key='address'>{{ $local_output->address }}</td>
                                <td field-key='port'>{{ $local_output->port }}</td>
                                <td field-key='channel_server'>{{ $local_output->channel_server->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.local_outputs.restore', $local_output->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.local_outputs.perma_del', $local_output->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('local_output_view')
                                    <a href="{{ route('admin.local_outputs.show',[$local_output->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('local_output_edit')
                                    <a href="{{ route('admin.local_outputs.edit',[$local_output->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('local_output_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.local_outputs.destroy', $local_output->id])) !!}
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.channel_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


