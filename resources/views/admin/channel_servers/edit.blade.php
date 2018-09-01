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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('channel', trans('global.channel-server.fields.channel').'', ['class' => 'control-label']) !!}
                    <button type="button" class="btn btn-primary btn-xs" id="selectbtn-channel">
                        {{ trans('global.app_select_all') }}
                    </button>
                    <button type="button" class="btn btn-primary btn-xs" id="deselectbtn-channel">
                        {{ trans('global.app_deselect_all') }}
                    </button>
                    {!! Form::select('channel[]', $channels, old('channel') ? old('channel') : $channel_server->channel->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple', 'id' => 'selectall-channel' ]) !!}
                    <p class="help-block"></p>
                    @if($errors->has('channel'))
                        <p class="help-block">
                            {{ $errors->first('channel') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Default Cloud A
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.default-cloud-a.fields.address')</th>
                        <th>@lang('global.default-cloud-a.fields.port')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="default-cloud-a">
                    @forelse(old('default_cloud_as', []) as $index => $data)
                        @include('admin.channel_servers.default_cloud_as_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($channel_server->default_cloud_as as $item)
                            @include('admin.channel_servers.default_cloud_as_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Default Cloud B
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.default-cloud-b.fields.address')</th>
                        <th>@lang('global.default-cloud-b.fields.port')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="default-cloud-b">
                    @forelse(old('default_cloud_bs', []) as $index => $data)
                        @include('admin.channel_servers.default_cloud_bs_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($channel_server->default_cloud_bs as $item)
                            @include('admin.channel_servers.default_cloud_bs_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Local Output
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('global.local-output.fields.address')</th>
                        <th>@lang('global.local-output.fields.port')</th>
                        
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="local-output">
                    @forelse(old('local_outputs', []) as $index => $data)
                        @include('admin.channel_servers.local_outputs_row', [
                            'index' => $index
                        ])
                    @empty
                        @foreach($channel_server->local_outputs as $item)
                            @include('admin.channel_servers.local_outputs_row', [
                                'index' => 'id-' . $item->id,
                                'field' => $item
                            ])
                        @endforeach
                    @endforelse
                </tbody>
            </table>
            <a href="#" class="btn btn-success pull-right add-new">@lang('global.app_add_new')</a>
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script type="text/html" id="default-cloud-a-template">
        @include('admin.channel_servers.default_cloud_as_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="default-cloud-b-template">
        @include('admin.channel_servers.default_cloud_bs_row',
                [
                    'index' => '_INDEX_',
                ])
               </script > 

    <script type="text/html" id="local-output-template">
        @include('admin.channel_servers.local_outputs_row',
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
    <script>
        $("#selectbtn-channel").click(function(){
            $("#selectall-channel > option").prop("selected","selected");
            $("#selectall-channel").trigger("change");
        });
        $("#deselectbtn-channel").click(function(){
            $("#selectall-channel > option").prop("selected","");
            $("#selectall-channel").trigger("change");
        });
    </script>
@stop