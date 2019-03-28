<?php

declare(strict_types=1);

 

if (! function_exists('channelconf')) {
    /**
     * Access the escapeSlashes helper.
     */
    function channelconf($id): void
    {
        $channel_server = \App\ChannelServer::findOrFail($id);

        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();

        //dd($cs_list_channels);

        $channelserverpath = config('confs.paths.cs_conf');

        File::isDirectory($channelserverpath.$channel_server->name) or File::makeDirectory($channelserverpath.$channel_server->name, 0777, true, true);

        if (file_exists($channelserverpath.$channel_server->name)) {
            $contents = [];

            $contents = "";
            if ($cs_list_channels) {
                foreach ($cs_list_channels as $cs_list_channel) {
                    // $contents .= "\n";
                    $contents .= ''.$cs_list_channel->channel->channel_name.','.$cs_list_channel->channel->channel_type."\n";
                    // $contents .= "\n";
                }
            }
            $contents .= "# CREATED: " .date('m-d-Y H:i:s')."\n";
            // $contents .= "\n";

            //dd($contents);

            File::put($channelserverpath.$channel_server->name.'/ChannelIDs.conf', $contents);

            Log::info('BOTTON: Created ChannelServer.conf NAMED: ' . $channel_server->name . ' ID:' . $id . ' ON: '. date('Y-m-d H:i:s'));
        }
    }
}
