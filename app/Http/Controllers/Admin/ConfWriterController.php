<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CsChannelList;
use App\Http\Requests\Admin\StoreCsChannelListsRequest;
use App\Http\Requests\Admin\UpdateCsChannelListsRequest;

class ConfWriterController extends Controller
{
    public function index()
    {
    	$channellists = CsChannelList::all();

		$filename = resource_path("ChannelID.conf");
		$file = fopen($filename, 'a', 1);
		// $channellist  = [];
 

		foreach ($channellists as $row) {
                $channellist[] = array($row['channel_name'],  $row['channel_type']);
        }

		// dd($file);
		// $text = "\n Your text to write \n ".date('d')."-".date('m')."-".date('Y')."\n\n";
		// $text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat adipisci, dolor eos quo similique distinctio. Dolores autem, perspiciatis ipsum explicabo aut commodi quis repellendus, beatae totam, debitis fugit expedita, quasi!"."\n\n";
		
 





    	return view('writer', compact('channellist'));
    }
}
