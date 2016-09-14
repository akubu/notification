<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

use App\Http\Requests;

class notifications extends Controller
{
    public function master($message)
    {
//        connection.query('INSERT into `notifications`(`uid_source`,`message`,`uid_target`) values ("' + json.uid_source + '","' + json.message + '","' + target + '")', function (err, rows, fields) {
//        dd($message['uid_target']);
        foreach ($message['uid_target'] as $target) {
            $new=new Notification();
            $new->uid_source = Auth::user()->email;
            $new->message = $message['message'];
            $new->uid_target=$target;
            $new->type=$message['type'];
            $new->save();
        }
        $redis = Redis::connection();
        $json=\GuzzleHttp\json_encode($message);
        $redis->publish('m', $json);
        
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
