@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.baby-sync-servers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.baby_sync_servers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('baby_sync_server', trans('global.baby-sync-servers.fields.baby-sync-server').'', ['class' => 'control-label']) !!}
                    {!! Form::text('baby_sync_server', old('baby_sync_server'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('baby_sync_server'))
                        <p class="help-block">
                            {{ $errors->first('baby_sync_server') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('parent_aggregation_server_id', trans('global.baby-sync-servers.fields.parent-aggregation-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('parent_aggregation_server_id', $parent_aggregation_servers, old('parent_aggregation_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Host URL or IP of the Baby Sync Server</p>
                    @if($errors->has('parent_aggregation_server_id'))
                        <p class="help-block">
                            {{ $errors->first('parent_aggregation_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.baby-sync-servers.fields.sync-server').'', ['class' => 'control-label']) !!}
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

