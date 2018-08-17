@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.timezone.title')</h3>
    
    {!! Form::model($timezone, ['method' => 'PUT', 'route' => ['admin.timezones.update', $timezone->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('timezone', trans('global.timezone.fields.timezone').'', ['class' => 'control-label']) !!}
                    {!! Form::text('timezone', old('timezone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('timezone'))
                        <p class="help-block">
                            {{ $errors->first('timezone') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

