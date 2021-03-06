@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-settings.title')</h3>
    
    {!! Form::model($video_setting, ['method' => 'PUT', 'route' => ['admin.video_settings.update', $video_setting->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_url', trans('global.video-settings.fields.server-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('server_url', old('server_url'), ['class' => 'form-control', 'placeholder' => 'Enter the server URL']) !!}
                    <p class="help-block">Enter the server URL</p>
                    @if($errors->has('server_url'))
                        <p class="help-block">
                            {{ $errors->first('server_url') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_redirect', trans('global.video-settings.fields.server-redirect').'', ['class' => 'control-label']) !!}
                    {!! Form::text('server_redirect', old('server_redirect'), ['class' => 'form-control', 'placeholder' => 'Possible parameters to add to the url that will be replaced dynamically: EPOCHSTART, EPOCHEND, DURATION, CHANNELNAME, CHANNELID']) !!}
                    <p class="help-block">Possible parameters to add to the url that will be replaced dynamically: EPOCHSTART, EPOCHEND, DURATION, CHANNELNAME, CHANNELID</p>
                    @if($errors->has('server_redirect'))
                        <p class="help-block">
                            {{ $errors->first('server_redirect') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('hls', trans('global.video-settings.fields.hls').'', ['class' => 'control-label']) !!}
                    {!! Form::number('hls', old('hls'), ['class' => 'form-control', 'placeholder' => 'Enter the HLS-Shift (example : +0)']) !!}
                    <p class="help-block">Enter the HLS-Shift (example : +0)</p>
                    @if($errors->has('hls'))
                        <p class="help-block">
                            {{ $errors->first('hls') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.video-settings.fields.sync-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('sync_server_id', $sync_servers, old('sync_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sync_server_id'))
                        <p class="help-block">
                            {{ $errors->first('sync_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('video_server_type_id', trans('global.video-settings.fields.video-server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('video_server_type_id', $video_server_types, old('video_server_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('video_server_type_id'))
                        <p class="help-block">
                            {{ $errors->first('video_server_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

