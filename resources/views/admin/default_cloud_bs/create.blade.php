@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.default-cloud-b.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.default_cloud_bs.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('address', trans('global.default-cloud-b.fields.address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('port', trans('global.default-cloud-b.fields.port').'', ['class' => 'control-label']) !!}
                    {!! Form::text('port', old('port'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('port'))
                        <p class="help-block">
                            {{ $errors->first('port') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_server_id', trans('global.default-cloud-b.fields.channel-server').'', ['class' => 'control-label']) !!}
                    {!! Form::select('channel_server_id', $channel_servers, old('channel_server_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_server_id'))
                        <p class="help-block">
                            {{ $errors->first('channel_server_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

