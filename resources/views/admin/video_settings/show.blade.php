@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.video-settings.fields.server-url')</th>
                            <td field-key='server_url'>{{ $video_setting->server_url }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.video-settings.fields.server-redirect')</th>
                            <td field-key='server_redirect'>{{ $video_setting->server_redirect }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.video-settings.fields.hls')</th>
                            <td field-key='hls'>{{ $video_setting->hls }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.video_settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


