@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.per-channel-configurations.title')</h3>
    @can('per_channel_configuration_create')
    <p>
        <a href="{{ route('admin.per_channel_configurations.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.per_channel_configurations.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.per_channel_configurations.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('per_channel_configuration_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('per_channel_configuration_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.per-channel-configurations.fields.cid')</th>
                        <th>@lang('global.per-channel-configurations.fields.active')</th>
                        <th>@lang('global.per-channel-configurations.fields.notify-channel-id')</th>
                        <th>@lang('global.per-channel-configurations.fields.offset')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-lengths')</th>
                        <th>@lang('global.per-channel-configurations.fields.ad-spacing')</th>
                        <th>@lang('global.per-channel-configurations.fields.rtn')</th>
                        <th>@lang('global.realtime-notification.fields.r-urltn')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('per_channel_configuration_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.per_channel_configurations.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.per_channel_configurations.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('per_channel_configuration_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'cid', name: 'cid'},
                {data: 'active', name: 'active'},
                {data: 'notify_channel_id', name: 'notify_channel_id'},
                {data: 'offset', name: 'offset'},
                {data: 'ad_lengths', name: 'ad_lengths'},
                {data: 'ad_spacing', name: 'ad_spacing'},
                {data: 'rtn.server_type', name: 'rtn.server_type'},
                {data: 'rtn.r_urltn', name: 'rtn.r_urltn'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection