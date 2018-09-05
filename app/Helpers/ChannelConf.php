<?php
 use Illuminate\Http\File;

if (!function_exists('channelconf')) {
    /**
     * Access the escapeSlashes helper.
     */
    function channelconf($id)
    {
        $channel_server = \App\ChannelServer::findOrFail($id);

        $cs_list_channels = \App\CsListChannel::where('channelserver_id', $id)->get();

        //dd($cs_list_channels);

        $channelserverpath = config('confs.paths.cs_conf');

        File::isDirectory($channelserverpath . $channel_server->name) or File::makeDirectory($channelserverpath . $channel_server->name, 0777, true, true);

        if (file_exists($channelserverpath . $channel_server->name)) {

            $contents = [];

            $contents = "\n";
            if($cs_list_channels){
                foreach($cs_list_channels as $cs_list_channel){
                  $contents .= "".$cs_list_channel->channel->channel_name ."," . $cs_list_channel->channel->channel_type . "\n";
                }
            }
            $contents .= "\n";

            //dd($contents);

            File::put($channelserverpath . $channel_server->name . '/ChannelIDs.conf', $contents);

            Log::info("Created ChannelID.conf File Successfully");
        }
    }
}