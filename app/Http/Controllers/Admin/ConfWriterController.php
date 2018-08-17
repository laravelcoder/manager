<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App\Http\Controllers\Admin;

use App\CsChannelList;
use App\Http\Controllers\Controller;

class ConfWriterController extends Controller
{
    public function index()
    {
        $channellists = CsChannelList::all();

        $filename = resource_path('ChannelID.conf');
        $file = fopen($filename, 'a', 1);
        // $channellist  = [];

        foreach ($channellists as $row) {
            $channellist[] = [$row['channel_name'],  $row['channel_type']];
        }

        // dd($file);
        // $text = "\n Your text to write \n ".date('d')."-".date('m')."-".date('Y')."\n\n";
        // $text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat adipisci, dolor eos quo similique distinctio. Dolores autem, perspiciatis ipsum explicabo aut commodi quis repellendus, beatae totam, debitis fugit expedita, quasi!"."\n\n";

        return view('writer', compact('channellist'));
    }
}
