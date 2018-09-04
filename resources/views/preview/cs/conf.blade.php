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
    

    <div class="panel panel-default">
  
{{-- <h1>{!! $channelServerPath !!}</h1> --}}
<br>
[INPUT]<br>
@foreach ($csis as $input)
    @if($input->protocol == 'UDP')
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
        &
        PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol !!}
        &
        URL{!! $loop->iteration !!}={!! @$input->url !!}
        <br>
    @elseif($input->protocol == 'MOVE')
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
        &
        PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol !!}
        &
        URL{!! $loop->iteration !!}={!! @$input->url !!}
        <br>
    @else
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
    &
    PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol !!}
    &
    SSM{!! $loop->iteration !!}={!! @$input->ssm !!}
    &
    IMC{!! $loop->iteration !!}={!! @$input->imc !!}
    &
    IP{!! $loop->iteration !!}={!! @$input->ip !!}
    &
    PID{!! $loop->iteration !!}={!! @$input->pid !!}
    <br>
    @endif
@endforeach
<br>
[OUTPUT]<br>

OMC1={!! @$lo->address  !!}&OP1={!! @$lo->port  !!}<br>
OCLOUD1={!! @$dca->address  !!}&OCP1={!! @$dca->port  !!}<br>
OCLOUD2={!! @$dcb->address  !!}&OCP2={!! @$dcb->port  !!}<br>

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