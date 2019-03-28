<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use File;
use App\Protocol;
use App\ChannelServer;
use App\CsListChannel;
use App\Helpers\ChannelConf;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CsConfController extends Controller
{
    public function create_cs_conf($id, $contents = null)
    {
        // if (! Gate::allows('channel_server_view')) {
        //     return abort(401);
        // }

        $channel_server = \App\ChannelServer::findOrFail($id);
        $channels = \App\ChannelsList::get()->pluck('channel_name', 'id');
        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();
        $ss_list_channels = \App\SsListChannel::where('channel_server_id', $id)->get();

        $protocols = \App\Protocol::get()->pluck('protocol', 'id');
        // $protocols = \App\Protocol::findOrFail($id);
//        $dca = $channel_server->default_cloud_as;
//        $dcb = $channel_server->default_cloud_bs;
//        $localdefault = $channel_server->local_outputs;

        $dca = \App\DefaultCloudA::findOrFail($id);
        $dcb = \App\DefaultCloudB::findOrFail($id);
        $localdefault = \App\LocalOutput::findOrFail($id);

        $channelserverpath = config('confs.paths.cs_conf');
        File::isDirectory($channelserverpath.$channel_server->name) or File::makeDirectory($channelserverpath.$channel_server->name, 0777, true, true);

        if (file_exists($channelserverpath.$channel_server->name)) {
            $contents = [];

            $contents = "[INPUT]\n";
            $csis_count = 0;
            $dca_count = 0;
            $lo_count = 0;
            $dcb_count = 0;
            $csos_count = 0;

            if (count($csis) > 0) {
                foreach ($csis as $csi) {
                    $csis_count = $csis_count + 1;
                    if ($csi->protocol === 'UDP') {
                        $contents .= 'CID'.$csis_count.'='.$csi->channel->id.'&PROTOCOL'.$csis_count.'='.$csi->protocol->id.'&URL'.$csis_count.'='.$csi->url."\n";
                    } elseif ($csi->protocol === 'MOVE') {
                        $contents .= 'CID'.$csis_count.'='.$csi->channel->id.'&PROTOCOL'.$csis_count.'='.$csi->protocol.'&URL'.$csis_count.'='.$csi->url."\n";
                    } else {
                        $contents .= 'CID'.$csis_count.'='.$csi->channel->id.'&PROTOCOL'.$csis_count.'='.$csi->protocol.'&SSM'.$csis_count.'='.$csi->ssm.'&IMC'.$csis_count.'='.$csi->imc.'&IP'.$csis_count.'='.$csi->ip.'&PID'.$csis_count.'='.$csi->pid."\n";
                    }
                }
            }

            $contents .= "\n";
            $contents .= "[OUTPUT]\n";
            if ($localdefault) {
                $lo_count = $lo_count + 1;
                $contents .= 'OMC'.$lo_count.'='.$localdefault['address'].'&OP'.$lo_count.'='.$localdefault['port']."\n";
            }
            if ($dca) {
                $contents .= 'OCLOUD1='.$dca['address'].'&OCP1='.$dca['port']."\n";
            }
            if ($dcb) {
                $contents .= 'OCLOUD2='.$dcb['address'].'&OCP2='.$dcb['port']."\n";
            }
            if ($csos) {
                foreach ($csos as $output) {
                    $csos_count = $csos_count + 1;
                    $contents .= 'OCLOUD_A_'.$csos_count.'='.$output['ocloud_a'].'&OCP_A_'.$csos_count.'='.$output['ocp_a'].'&OCLOUD_B_'.$csos_count.'='.$output['ocloud_b'].'&OCP_B_'.$csos_count.'='.$output['ocp_b']."\n";
                }
            }

            $contents .= "\n";
            $contents .= "[LICENSE]\n";
            $contents .= "LIC=ChannelServer-4.1-20991231-20180610-DISHCS!localhost!00000000000000000000000\n";
            $contents .= "\n";
            $contents .= "[PARAMETERS]\n";
            $contents .= "\n";

            File::put($channelserverpath.$channel_server->name.'/ChannelServer.conf', $contents);
        }

        return view('preview.cs.conf', compact('channel_server', 'csis', 'csos', 'cs_list_channels', 'ss_list_channels', 'channelserverpath', 'protocols', 'protocol', 'dca', 'dcb', 'lo', 'contents'));
    }

    public function preview_channels_conf($id, $contents = null)
    {
        $channel_server = \App\ChannelServer::findOrFail($id);
        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();

        //dd($cs_list_channels);

//         $channelserverpath = config('confs.paths.cs_conf');

//         File::isDirectory($channelserverpath . $channel_server->name) or File::makeDirectory($channelserverpath . $channel_server->name, 0777, true, true);

//         if (file_exists($channelserverpath . $channel_server->name)) {

//             $contents = [];

//             $contents = "";
//             if($cs_list_channels){
//                 foreach($cs_list_channels as $cs_list_channel){
//                   $contents .= "".$cs_list_channel->channel->channel_name ."," . $cs_list_channel->channel->channel_type . "\n";
//                 }
//             }
//             // $contents .= "\n";

//             //dd($contents);

//             File::put($channelserverpath . $channel_server->name . '/ChannelIDs.conf', $contents);

//             Storage::prepend('channelserver.log', 'Created ChannelServer.conf File Successfully NAMED: ' . $channel_server->name . ' ID:' . $id . ' ON: '. date('Y-m-d H:i:s'));
        // //            Log::info('Created ChannelServer.conf File Successfully');
        // //
        // //            Log::debug('An informational message.');
        // //            Log::emergency('The system is down!');
//             Log::info('Created ChannelServer.conf NAMED: ' . $channel_server->name . ' ID:' . $id . ' ON: '. date('Y-m-d H:i:s'));

//         }

        return view('preview.cs.channels_conf', compact('cs_list_channels', 'channel_server'));
    }

    public function make_channels_conf($id)
    {
        $channel_server = \App\ChannelServer::findOrFail($id);
        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();

        channelconf($id);

        // return redirect('preview.cs.channels_conf', ['user' => CsListChannel::where('channelserver_id', $id)->get()]);
        return redirect('preview/cs/channel_conf/'.$id);
    }

    // public function downloadTxt()
// {
//     $txt = "";
//     $datas = User::select('id','name','lastname')
//             ->orderBy('id','desc')
//             ->take(100)
//             ->get();

//     foreach($datas as $data){
//         $txt .= $data['id'].'|'.$data['name'].'|'.$data['lastname'].PHP_EOL;
//     }
//     $txtname = 'mytxt.txt';
//     $headers = ['Content-type'=>'text/plain',
//                 'test'=>'YoYo',
//                 'Content-Disposition'=>sprintf('attachment; filename="%s"', $txtname),
//                 'X-BooYAH'=>'WorkyWorky','Content-Length'=>sizeof($datas)
//             ];

//     return \Response::make($txt , 200, $headers );

// }

//    public function create_settings_conf($id, $contents = null)
//    {
//
//        $channelserverpath = config('confs.paths.cs_conf');
//
//        File::isDirectory($channelserverpath . $channel_server->name) or File::makeDirectory($channelserverpath . $channel_server->name, 0777, true, true);
//
//        if (file_exists($channelserverpath . $channel_server->name)) {
//
//            $contents = [];
//
//            File::put($channelserverpath . $channel_server->name . '/settings.conf', $contents);
//        }
//
//        return view('preview.cs.settings_conf', compact('cs_list_channel'));
//    }
}
