<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

use App\Http\Requests;

class youtubeController extends Controller
{
    public function index()
    {
//        $video = Youtube::getVideoInfo('kw4tT7SCmaY');
//        dd($video);
//        $channel = Youtube::getChannelByName('xdadevelopers');
//        $video=Youtube::getVideoInfo('eJCOdC__ZZk');
//        $results = Youtube::search('Akshay Singh');
//        $channel=Youtube::getChannelById('UCFfrm7hkmY2MItlajgIHhQg'); //my channel
//        $channel=Youtube::getChannelById('UCqwUrj10mAEsqezcItqvwEw');
        $playlist = Youtube::getPlaylistItemsByPlaylistId('PLjwBf9QEIO95j5kXIm9XAS_NAiu9_NDmv');
        $var=[];
        for ($i=0;$i<$playlist['info']['totalResults'];$i++){

            $var[$i]=$playlist['results'][$i]->contentDetails->videoId;
        }
        return view('anniversary.dashboard',compact('var'));
    }
    public function index2()
    {
//        $video = Youtube::getVideoInfo('kw4tT7SCmaY');
//        dd($video);
//        $channel = Youtube::getChannelByName('xdadevelopers');
//        $video=Youtube::getVideoInfo('eJCOdC__ZZk');
//        $results = Youtube::search('Akshay Singh');
//        $channel=Youtube::getChannelById('UCFfrm7hkmY2MItlajgIHhQg'); //my channel
//        $channel=Youtube::getChannelById('UCqwUrj10mAEsqezcItqvwEw');
        $playlist = Youtube::getPlaylistItemsByPlaylistId('PLjwBf9QEIO95j5kXIm9XAS_NAiu9_NDmv');
        $var=[];
        for ($i=0;$i<$playlist['info']['totalResults'];$i++){

            $var[$i]=$playlist['results'][$i]->contentDetails->videoId;
        }
        return view('anniversary.videos',compact('var'));
    }
}
