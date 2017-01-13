<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;
use App\Http\Requests;

class youtubeController extends Controller
{
    public function index()
    {
        $video = Youtube::getVideoInfo('kw4tT7SCmaY');
        $channel = Youtube::getChannelByName('xdadevelopers');
        $playlists = Youtube::getPlaylistItemsByPlayListId('PLgLZvFga2ml4VO2M6YzG1yOoAyOhW2n17');
            $video=Youtube::getVideoInfo('eJCOdC__ZZk');
        dd($video);
    }//
}
