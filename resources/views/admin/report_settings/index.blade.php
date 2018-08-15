@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.report-settings.title')</h3>
    @can('report_setting_create')
    <p>
        <a href="{{ route('admin.report_settings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.report_settings.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.report_settings.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('report_setting_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('report_setting_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('report_setting_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.report_settings.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.report_settings.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [@can('report_setting_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan{data: 'millisecond_precision', name: 'millisecond_precision'},
                {data: 'show_channel_button', name: 'show_channel_button'},
                {data: 'show_clip_button', name: 'show_clip_button'},
                {data: 'show_group_button', name: 'show_group_button'},
                {data: 'show_live_button', name: 'show_live_button'},
                {data: 'enable_evt', name: 'enable_evt'},
                {data: 'enable_excel', name: 'enable_excel'},
                {data: 'enable_evt_timing', name: 'enable_evt_timing'},
                {data: 'timezone', name: 'timezone'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection