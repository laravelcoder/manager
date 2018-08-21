@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-settings.title')</h3>
    @can('video_setting_create')
    <p>
        <a href="{{ route('admin.video_settings.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable @can('video_setting_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('video_setting_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.video-settings.fields.server-url')</th>
                        <th>@lang('global.video-settings.fields.server-redirect')</th>
                        <th>@lang('global.video-settings.fields.hls')</th>
                        <th>@lang('global.video-settings.fields.sync-server')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('video_setting_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.video_settings.mass_destroy') }}';
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.video_settings.index') !!}';
            window.dtDefaultOptions.columns = [@can('video_setting_delete')
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endcan{data: 'server_url', name: 'server_url'},
                {data: 'server_redirect', name: 'server_redirect'},
                {data: 'hls', name: 'hls'},
                {data: 'sync_server.name', name: 'sync_server.name'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection