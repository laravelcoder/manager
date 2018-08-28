@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.aggregation-server.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.aggregation_servers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_name', trans('global.aggregation-server.fields.server-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('server_name', old('server_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('server_name'))
                        <p class="help-block">
                            {{ $errors->first('server_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('server_host', trans('global.aggregation-server.fields.server-host').'', ['class' => 'control-label']) !!}
                    {!! Form::text('server_host', old('server_host'), ['class' => 'form-control', 'placeholder' => 'Name or IP address of the aggregation server (optional)']) !!}
                    <p class="help-block">Name or IP address of the aggregation server (optional)</p>
                    @if($errors->has('server_host'))
                        <p class="help-block">
                            {{ $errors->first('server_host') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sync_server_id', trans('global.aggregation-server.fields.sync-server').'', ['class' => 'control-label']) !!}
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
    <div class="panel panel-default">
        <div class="panel-heading">
            Baby Sync Servers
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.baby-sync-servers.fields.baby-sync-server')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="baby-sync-servers">
                    @foreach(old('baby_sync_servers', []) as $index => $data)
                        @include('admin.aggregation_servers.baby_sync_servers_row', [
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

    <script type="text/html" id="baby-sync-servers-template">
        @include('admin.aggregation_servers.baby_sync_servers_row',
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