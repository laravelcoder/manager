@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">Channel Server Data Preview</h3>
    

    <p>
        <ul class="list-inline">
            <li>hi</li> |
            <li>hi again</li>
        </ul>
    </p>
    

    <div class="panel panel-default">
  
{{-- <h1>{!! $channelServerPath !!}</h1> --}}
<br>
[INPUT]<br>
@foreach ($csis as $input)
    @if($input->protocol->protocol == 'UDP')
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
        &
        PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol->protocol !!}
        &
        URL{!! $loop->iteration !!}={!! @$input->url !!}
        <br>
    @elseif($input->protocol->protocol == 'MOVE')
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
        &
        PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol->protocol !!}
        &
        URL{!! $loop->iteration !!}={!! @$input->url !!}
        <br>
    @else
    CID{!! $loop->iteration !!}={!! @$input->channel->id !!}
    &
    PROTOCOL{!! $loop->iteration !!}={!! @$input->protocol->protocol !!}
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
 
{{-- CID0=0&PROTOCOL0=MOVE&URL0=/home/caipy/segments_in --}}



{{-- // [OUTPUT]
// OMC1=227.228.229.3&OP1=20003
// OCLOUD1=127.0.0.1&OCP1=8080
// OCLOUD2=&OCP2=
// OCLOUD_A_0=&OCP_A_0=&OCLOUD_B_0=&OCP_B_0= --}}




    </div>
@stop

@section('javascript') 
    <script>

    </script>
@endsection