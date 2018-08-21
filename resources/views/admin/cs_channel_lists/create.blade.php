@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cs-channel-list.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.cs_channel_lists.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_name', trans('global.cs-channel-list.fields.channel-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('channel_name', old('channel_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_name'))
                        <p class="help-block">
                            {{ $errors->first('channel_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_type', trans('global.cs-channel-list.fields.channel-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('channel_type', old('channel_type'), ['class' => 'form-control', 'placeholder' => 'enter prod or dev']) !!}
                    <p class="help-block">enter prod or dev</p>
                    @if($errors->has('channel_type'))
                        <p class="help-block">
                            {{ $errors->first('channel_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_server_id', trans('global.cs-channel-list.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.cs-channel-list.fields.sync-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('sync_server_id', $sync_servers, old('sync_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sync_server_id'))
                        <p class="help-block">
                            {{ $errors->first('sync_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

