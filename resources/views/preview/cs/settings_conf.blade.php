@inject('request', 'Illuminate\Http\Request')

@extends('layouts.app')

@section('content')
    <h3 class="page-title">Channel Server Data Preview</h3>
    

    <p>
        <ul class="list-inline">
            <li>Channel Server</li> |
            <li>Configuration File</li>
        </ul>
    </p>
    

    <div class="panel panel-default" style="font-family: impact;">
  
{{-- <h1>{!! $channelserverpath !!}{!! $channel_server->name !!}</h1> --}}
{{-- <br> --}}
[INPUT]<br>
@if (count($csis) > 0)
    @foreach ($csis as $csi)
        @if($csi->protocol == 'UDP')
        CID{!! $loop->iteration !!}={!! $csi->channel->id or '' !!}
            &
            PROTOCOL{!! $loop->iteration !!}={{ $csi->protocol->protocol or '' }}
            &
            URL{!! $loop->iteration !!}={!! $csi->url or '' !!}
            <br>
        @elseif($csi->protocol == 'MOVE')
        CID{!! $loop->iteration !!}={!! $csi->channel->id or '' !!}
            &
            PROTOCOL{!! $loop->iteration !!}={{ $csi->protocol->protocol or '' }}
            &
            URL{!! $loop->iteration !!}={!! $csi->url or '' !!}
            <br>
        @else
        CID{!! $loop->iteration !!}={!! $csi->channel->id or '' !!}
        &
        PROTOCOL{!! $loop->iteration !!}={{ $csi->protocol->protocol or '' }}
        &
        SSM{!! $loop->iteration !!}={!! $csi->ssm or '' !!}
        &
        IMC{!! $loop->iteration !!}={!! $csi->imc or '' !!}
        &
        IP{!! $loop->iteration !!}={!! $csi->ip or '' !!}
        &
        PID{!! $loop->iteration !!}={!! $csi->pid or '' !!}
        <br>
        @endif
    @endforeach
@endif
<br>
[OUTPUT]<br>

OMC1={!! $lo->address or ''  !!}&OP1={!! $lo->port or ''  !!}<br>
OCLOUD1={!! $dca->address or ''  !!}&OCP1={!! $dca->port or ''  !!}<br>
OCLOUD2={!! $dcb->address or ''  !!}&OCP2={!! $dcb->port or ''  !!}<br>

@foreach ($csos as $output)
    
{{--     CID{!! $loop->iteration !!}={!! @$output->channel->id !!}
    & --}}
    OCLOUD_A_{!! $loop->iteration !!}={!! @$output->ocloud_a !!}
    &
    OCP_A_{!! $loop->iteration !!}={!! @$output->ocp_a !!}
    &
    OCLOUD_B_{!! $loop->iteration !!}={!! @$output->ocloud_b !!}
    &
    OCP_B_{!! $loop->iteration !!}={!! @$output->ocp_b !!}
    <br>
 
@endforeach
 
<br style="clear:both" />
[LICENSE]<br>
LIC=ChannelServer-4.1-20991231-20180610-DISHCS!localhost!00000000000000000000000<br>

<br style="clear:both" />
[PARAMETERS]<br>
WAVINPUT=0<br>


<br style="clear:both" />
<br />
<br />

    </div>
@stop

@section('javascript') 
    <script>

    </script>
@endsection