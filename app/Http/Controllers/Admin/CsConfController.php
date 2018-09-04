<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Protocol;
use App\ChannelServer;
use App\Http\Controllers\Controller;

class CsConfController extends Controller
{
    public function create_conf($id)
    {
        // if (! Gate::allows('channel_server_view')) {
        //     return abort(401);
        // }

        $channels = \App\ChannelsList::get()->pluck('channel_name', 'id');
        $csis = \App\Csi::where('channel_server_id', $id)->get();
        $csos = \App\Cso::where('channel_server_id', $id)->get();
        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();
        $ss_list_channels = \App\SsListChannel::where('channel_server_id', $id)->get();
        $protocols = \App\Protocol::get()->pluck('protocol', 'id');
        // $proto = \App\Protocol::where('channel_server_id', $id)->get();
        $channel_server = \App\ChannelServer::findOrFail($id);

        // $channelServerPath = config('confs.paths.cs_conf.'. $channel_server->name);
        $channelServerPath = config('confs.paths.cs_conf.');

        if (file_exists($channelServerPath)) {
            $txt_file = file_get_contents($channelServerPath.'/ChannelServer.conf');
            $rows = explode("\n", $txt_file);

            // CID0=0&PROTOCOL0=MOVE&URL0=/home/caipy/segments_in
            // CID7=20&PROTOCOL7=UDP&SSM7=172.31.1.21&IMC7=232.20.97.195&IP7=3101&PID7=
            //

        // foreach($csis as $input) {
        //    $url = $input->url
        // }

// [OUTPUT]
// OMC1=227.228.229.3&OP1=20003
// OCLOUD1=127.0.0.1&OCP1=8080
// OCLOUD2=&OCP2=
// OCLOUD_A_0=&OCP_A_0=&OCLOUD_B_0=&OCP_B_0=

// [LICENSE]
// LIC=ChannelServer-4.1-20991231-20180610-DISHCS!localhost!00000000000000000000000

// [PARAMETERS]
// WAVINPUT=0

        // $inputcontent = "[INPUT]\n";

        // for ($i = 0; $i < count($this->input); $i++) {
        // 	if ($this->input[$i]->protocol == "HLS") {
        // 		$inputcontent .= "CID" . $i . "=" . $this->input[$i]->cid . "&PROTOCOL" . $i . "=" . $this->input[$i]->protocol . "&URL" . $i . "=" . $this->input[$i]->url . "\n";
        // 	} else
        // 	if ($this->input[$i]->protocol == "MOVE") {
        // 		$inputcontent .= "CID" . $i . "=" . $this->input[$i]->cid . "&PROTOCOL" . $i . "=" . $this->input[$i]->protocol . "&URL" . $i . "=" . $this->input[$i]->url . "\n";
        // 	} else {
        // 		$inputcontent .= "CID" . $i . "=" . $this->input[$i]->cid . "&PROTOCOL" . $i . "=" . $this->input[$i]->protocol . "&SSM" . $i . "=" . $this->input[$i]->ssm . "&IMC" . $i . "=" . $this->input[$i]->ip . "&IP" . $i . "=" . $this->input[$i]->port . "&PID" . $i . "=" . $this->input[$i]->pid . "\n";
        // 	}
        // }

        // $outputcontent = "\n[OUTPUT]\n";
        // // OMC1=224.0.0.2&OP1=10002
        // $outputcontent .= "OMC1=" . $this->output->local->ip . "&OP1=" . $this->output->local->port . "\n";
        // for ($i = 0; $i < count($this->output->cloud); $i++) {
        // 	// OCLOUD1=tv.precisestatistics.com&OCP1=80
        // 	$outputcontent .= "OCLOUD" . $alpha[($i)] . "=" . $this->output->cloud[$i]->ip . "&OCP" . $alpha[($i)] . "=" . $this->output->cloud[$i]->port . "\n";
        // }

        // for ($i = 0; $i < count($this->output->channelClouds); $i++) {
        // 	// OCLOUD_A_0=tv.precisestatistics.com&OCP0_A=80&OCLOUD0_B=tv.caipy.com&OCP0_B=8080
        // 	$outputcontent .= "OCLOUD_A_" . $i . "=" . $this->output->channelClouds[$i]->cloudA->ip . "&OCP_A_" . $i . "=" . $this->output->channelClouds[$i]->cloudA->port;
        // 	$outputcontent .= "&OCLOUD_B_" . $i . "=" . $this->output->channelClouds[$i]->cloudB->ip . "&OCP_B_" . $i . "=" . $this->output->channelClouds[$i]->cloudB->port . "\n";
        // }

        // $licencecontent = "\n[LICENSE]\n";
        // for ($i = 0; $i < count($this->licence); $i++) {
        // 	// LIC=ChannelServer-2.0-20130531-20120315-406sfhk4fgk468kry46i460xbvx78s56rt45s3hs
        // 	$licencecontent .= "LIC=" . $this->licence[$i]->type . "-" . $this->licence[$i]->version . "-" . $this->licence[$i]->stop . "-" . $this->licence[$i]->start . "-" . $this->licence[$i]->data . "\n";
        // }
        // $parameterscontent = "\n[PARAMETERS]\n";

        // if (!empty($this->parameters)) {
        // 	$parameterscontent .= "WAVINPUT=" . $this->parameters->wavinput . "\n";
        // }
        }

        return view('preview.cs.conf', compact('channel_server', 'csis', 'csos', 'cs_list_channels', 'ss_list_channels', 'channelServerPath', 'protocols', 'protocol'));
    }
}
