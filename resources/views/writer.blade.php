@inject('request', 'Illuminate\Http\Request')
@inject('ChannelServer', 'App\ChannelServer')

@extends('layouts.app')

 

 

@section('content')

{{ $channellist }}




@stop

