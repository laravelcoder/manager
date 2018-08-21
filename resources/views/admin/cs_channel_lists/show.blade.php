@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cs-channel-list.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.cs-channel-list.fields.channel-name')</th>
                            <td field-key='channel_name'>{{ $cs_channel_list->channel_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cs-channel-list.fields.channel-type')</th>
                            <td field-key='channel_type'>{{ $cs_channel_list->channel_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.cs-channel-list.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $cs_channel_list->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#cso" aria-controls="cso" role="tab" data-toggle="tab">Channel Server Outputs</a></li>
<li role="presentation" class=""><a href="#csi" aria-controls="csi" role="tab" data-toggle="tab">Channel Server Inputs</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="cso">
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
<div role="tabpanel" class="tab-pane " id="csi">
<table class="table table-bordered table-striped {{ count($csis) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.csi.fields.channel')</th>
                        <th>@lang('global.csi.fields.protocol')</th>
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
                    <td field-key='channel'>{{ $csi->channel->channel_name or '' }}</td>
                                <td field-key='protocol'>{{ $csi->protocol->protocol or '' }}</td>
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
                <td colspan="12">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.cs_channel_lists.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


