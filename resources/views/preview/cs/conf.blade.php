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

 <div id="conf-preview" style="margin-left:20px;font-size: 1.5em;">
        [INPUT]<br>
        @if (count($csis) > 0)
            @foreach ($csis as $csi)
                @if($csi->protocol == 'UDP')
                CID{!! $loop->iteration !!}=<strong>{!! $csi->channel->id or '' !!}</strong>
                    &
                    PROTOCOL{!! $loop->iteration !!}=<strong>{{ $csi->protocol->protocol or '' }}</strong>
                    &
                    URL{!! $loop->iteration !!}=<strong>{!! $csi->url or '' !!}</strong>
                    <br>
                @elseif($csi->protocol == 'MOVE')
                CID{!! $loop->iteration !!}=<strong>{!! $csi->channel->id or '' !!}</strong>
                    &
                    PROTOCOL{!! $loop->iteration !!}=<strong>{{ $csi->protocol->protocol or '' }}</strong>
                    &
                    URL{!! $loop->iteration !!}=<strong>{!! $csi->url or '' !!}</strong>
                    <br>
                @else
                CID{!! $loop->iteration !!}=<strong>{!! $csi->channel->id or '' !!}</strong>
                &
                PROTOCOL{!! $loop->iteration !!}=<strong>{{ $csi->protocol->protocol or '' }}</strong>
                &
                SSM{!! $loop->iteration !!}=<strong>{!! $csi->ssm or '' !!}</strong>
                &
                IMC{!! $loop->iteration !!}=<strong>{!! $csi->imc or '' !!}</strong>
                &
                IP{!! $loop->iteration !!}=<strong>{!! $csi->ip or '' !!}</strong>
                &
                PID{!! $loop->iteration !!}=<strong>{!! $csi->pid or '' !!}</strong>
                <br>
                @endif
            @endforeach
        @endif
        <br>
        [OUTPUT]<br>

        OMC1=<strong>{!! $lo->address or ''  !!}</strong>&OP1=<strong>{!! $lo->port or ''  !!}</strong><br>
        OCLOUD1=<strong>{!! $dca->address or ''  !!}</strong>&OCP1=<strong>{!! $dca->port or ''  !!}</strong><br>
        OCLOUD2=<strong>{!! $dcb->address or ''  !!}</strong>&OCP2=<strong>{!! $dcb->port or ''  !!}</strong><br>

        @foreach ($csos as $output)
            
        {{--     CID{!! $loop->iteration !!}={!! @$output->channel->id !!}
            & --}}
            OCLOUD_A_{!! $loop->iteration !!}=<strong>{!! $output->ocloud_a or '' !!}</strong>
            &
            OCP_A_{!! $loop->iteration !!}=<strong>{!! $output->ocp_a or '' !!}</strong>
            &
            OCLOUD_B_{!! $loop->iteration !!}=<strong>{!! $output->ocloud_b or '' !!}</strong>
            &
            OCP_B_{!! $loop->iteration !!}=<strong>{!! $output->ocp_b or '' !!}</strong>
            <br>
         
        @endforeach
         
        <br style="clear:both" />
        [LICENSE]<br>
        LIC=ChannelServer-4.1-20991231-20180610-DISHCS!localhost!00000000000000000000000<br>

        <br style="clear:both" />
        [PARAMETERS]<br>
        WAVINPUT=0<br>

</div>
<br style="clear:both" />
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