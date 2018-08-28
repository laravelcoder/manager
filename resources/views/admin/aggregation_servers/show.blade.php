@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.aggregation-server.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.aggregation-server.fields.server-name')</th>
                            <td field-key='server_name'>{{ $aggregation_server->server_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.server-host')</th>
                            <td field-key='server_host'>{{ $aggregation_server->server_host }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.aggregation-server.fields.sync-server')</th>
                            <td field-key='sync_server'>{{ $aggregation_server->sync_server->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#baby_sync_servers" aria-controls="baby_sync_servers" role="tab" data-toggle="tab">Baby Sync Servers</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="baby_sync_servers">
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.aggregation_servers.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


