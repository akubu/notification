<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use GuzzleHttp;

use App\Http\Requests;


class notifications extends Controller
{
    function sendNotification($datax)
    {
//        Log::useDailyFiles(storage_path() . '/logs/notifications_master.log');
        $username = 'admin';
        $password = 'admin';
        $URL = 'http://103.25.172.110:8080/p2sapi/ws/v3/userlogin';

        $cookie_jar = tempnam('/tmp', 'cookie');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLINFO_HEADER_OUT, false);

        $data = array("userId" => "BI00407",
            "password" => "dintrin@v");
        $data_string = json_encode($data);

        if (strpos($data_string, 'success'))

            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code

        $headers = curl_getinfo($ch, CURLINFO_HEADER_OUT);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $result = curl_exec($ch);

        curl_close($ch);

        $url = "http://103.25.172.110:8080/openbd/mq/endpoint.cfc";

        $data = array("method" => "enqueue",
            "payload" => $datax['payload']
        );


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
//        dd($result);

        curl_close($ch);

//        Log::info("\n Data  : " . $datax['payload'] . " and response : " . $result . "\n");

        if ($result > 0) {
            return 1;
        } else {
            return 0;
        }

    }
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
        $data = array("method" => "enqueue", "payload" => "<payload><object>order</object><event>dc registered</event><object_id></object_id><customer><email_id>akshay.singh@power2sme.com</email_id><mobile_no>7838388154</mobile_no></customer><name>asdad</name><so_number>asdasdasd</so_number><dc_number>asdasda</dc_number></payload>");
        $this->sendNotification($data);
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
