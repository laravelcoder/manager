@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channels-list.title')</h3>
    
    {!! Form::model($channels_list, ['method' => 'PUT', 'route' => ['admin.channels_lists.update', $channels_list->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel_name', trans('global.channels-list.fields.channel-name').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('channel_type', trans('global.channels-list.fields.channel-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('channel_type', old('channel_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel_type'))
                        <p class="help-block">
                            {{ $errors->first('channel_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

