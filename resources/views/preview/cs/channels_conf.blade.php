@inject('request', 'Illuminate\Http\Request')

@extends('layouts.app')

@section('content')
    <h3 class="page-title">ChannelID Data Preview</h3>
    

    <p>
        <ul class="list-inline">
            <li>ChannelID</li> |
            <li>Configuration File</li>
        </ul>
    </p>
    

    <div class="panel panel-default" style="">
  
{{-- <h1>{!! $channelserverpath !!}{!! $channel_server->name !!}</h1> --}}
<br>
 <div id="conf-preview" style="margin-left:20px;font-size: 1.5em;">

@if($cs_list_channels)
    @foreach($cs_list_channels as $cs_list_channel)
      <strong>{{ $cs_list_channel->channel->channel_name }}</strong>, {!! $cs_list_channel->channel->channel_type !!}<br>
    @endforeach
@endif
  
     
 </div>
 
<br style="clear:both" />
{{-- {{  Form::open(['url' => action('Admin\CsConfController@make_channels_conf'), 'files'=>true,'method'=>'post'])  }} --}}
{{-- {!! Form::model($csi, ['method' => 'PUT', 'route' => ['make.channel.conf', $csi->id]]) !!} --}}
{!! Form::open(['method' => 'POST', 'route' => ['make.channel.conf', $channel_server->id]]) !!}

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Generate Conf</button>
                {!! Form::submit("Generate Conf", ['class' => 'btn btn-danger']) !!}
              </div>
{{ Form::close() }}

<br />
<br />

    </div>

@stop

@section('javascript') 
    <script>

    </script>
@endsection

@push('pagestyle')
<style>
#conf-preview {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
        "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji",
        "Segoe UI Emoji", "Segoe UI Symbol";
  }
</style>
@endpush