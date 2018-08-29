@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.cs-list-channels.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.cs_list_channels.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_id', trans('global.cs-list-channels.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channelserver_id', trans('global.cs-list-channels.fields.channelserver').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channelserver_id', $channelservers, old('channelserver_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channelserver_id'))
                        <p class="help-block">
                            {{ $errors->first('channelserver_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.cs-list-channels.fields.sync-server').'', ['class' => 'control-label']) !!}
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

