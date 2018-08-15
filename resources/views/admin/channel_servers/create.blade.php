@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.channel-server.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.channel_servers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
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
    <div class="panel panel-default">
        <div class="panel-heading">
            CS Channel List
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.cs-channel-list.fields.channel-name')</th>
                        <th>@lang('global.cs-channel-list.fields.channel-type')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="cs-channel-list">
                    @foreach(old('cs_channel_lists', []) as $index => $data)
                        @include('admin.channel_servers.cs_channel_lists_row', [
                            'index' => $index
                        ])
                    @endforeach
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="cs-channel-list-template">
        @include('admin.channel_servers.cs_channel_lists_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

            <script>
        $('.add-new').click(function () {
            var tableBody = $(this).parent().find('tbody');
            var template = $('#' + tableBody.attr('id') + '-template').html();
            var lastIndex = parseInt(tableBody.find('tr').last().data('index'));
            if (isNaN(lastIndex)) {
                lastIndex = 0;
            }
            tableBody.append(template.replace(/_INDEX_/g, lastIndex + 1));
            return false;
        });
        $(document).on('click', '.remove', function () {
            var row = $(this).parentsUntil('tr').parent();
            row.remove();
            return false;
        });
        </script>
@stop