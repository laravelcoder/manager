@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-server-type.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.video-server-type.fields.server-type')</th>
                            <td field-key='server_type'>{{ $video_server_type->server_type }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#video_settings" aria-controls="video_settings" role="tab" data-toggle="tab">Video Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="video_settings">
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.video_server_types.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


