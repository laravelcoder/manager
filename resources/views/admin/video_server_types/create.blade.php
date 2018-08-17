@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.video-server-type.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.video_server_types.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_type', trans('global.video-server-type.fields.server-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('server_type', old('server_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('server_type'))
                        <p class="help-block">
                            {{ $errors->first('server_type') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

