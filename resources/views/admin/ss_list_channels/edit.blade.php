@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.ss-list-channels.title')</h3>
    
    {!! Form::model($ss_list_channel, ['method' => 'PUT', 'route' => ['admin.ss_list_channels.update', $ss_list_channel->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.ss-list-channels.fields.sync-server').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('channel_id', trans('global.ss-list-channels.fields.channel').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_id', $channels, old('channel_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

