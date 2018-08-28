@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>
    
    {!! Form::model($channel_server, ['method' => 'PUT', 'route' => ['admin.channel_servers.update', $channel_server->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.channel-server.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cs_host', trans('global.channel-server.fields.cs-host').'', ['class' => 'control-label']) !!}
                    {!! Form::text('cs_host', old('cs_host'), ['class' => 'form-control', 'placeholder' => 'Enter the server / url host address for this channel server']) !!}
                    <p class="help-block">Enter the server / url host address for this channel server</p>
                    @if($errors->has('cs_host'))
                        <p class="help-block">
                            {{ $errors->first('cs_host') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

