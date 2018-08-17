@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clipdb-settings.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clipdb_settings.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('clip_db_url', trans('global.clipdb-settings.fields.clip-db-url').'', ['class' => 'control-label']) !!}
                    {!! Form::text('clip_db_url', old('clip_db_url'), ['class' => 'form-control', 'placeholder' => 'http://d-gp2-tocai-1.imovetv.com/']) !!}
                    <p class="help-block">http://d-gp2-tocai-1.imovetv.com/</p>
                    @if($errors->has('clip_db_url'))
                        <p class="help-block">
                            {{ $errors->first('clip_db_url') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

