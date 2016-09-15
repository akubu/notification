<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use GuzzleHttp;

use App\Http\Requests;


class notifications extends Controller
{
    public function master($message)
    {
        foreach ($message['uid_target'] as $target) {
            $new=new Notification();
            $new->uid_source = Auth::user()->email;
            $new->message = $message['message'];
            $new->uid_target=$target;
            $new->type=$message['type'];
            $new->save();
        }
        $redis = Redis::connection();
        $json=json_encode($message);
        $redis->publish('m', $json);
        
    }
    
    public function getNotification()
    {
        $user=Auth::user()->email;
        $not=Notification::where('uid_target','=',$user)->where('status','=','un_read')->get();
        $json=\GuzzleHttp\json_encode($not);
        return $json;
    }
    public function clearNotification()
    {
        $user=Auth::user()->email;
        Notification::where('uid_target','=',$user)->update(['status'=>'read']);
    }

    public function OnLogin()
    {
        $uid_source=Auth::user()->email;
        $name=Auth::user()->name;
        $message=$name .' logged in';
        $uid_target=array('akshay.singh@power2sme.com','harsh.khatri@power2sme.com');
        $message=array('type'=>'login','message'=>$message,'uid_source'=>$uid_source,'raw_data'=>$message,'action_target_link'=>'','uid_target'=>$uid_target);

//        $n=new Notification();
//        $n->uid_source=$uid_source;
//        $n->message=$message;
//		$n->save();
        //dd($message);

        //event(new notifications($n));
        
        $this->master($message);
        return redirect('/userHome');

    }
    //
}
