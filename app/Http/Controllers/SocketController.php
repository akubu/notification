<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Request;
use App\Events\notifications;
use Illuminate\Support\Facades\Redis;

class SocketController extends Controller {



//	public function __construct()
//	{
//		$this->middleware('guest');
//	}

	public function index()
	{

		return view('socket');

	}

	public function writemessage()
	{

		return view('writemessage');

	}

	public function sendMessage()
	{
		$redis = Redis::connection();
		$message=Input::get('text');
		$uid_source=Auth::user()->email;

		$message=array('message'=>$message,'uid_source'=>$uid_source,'raw_data'=>$message,'action_target_link'=>'','uid_target'=>'');

		$n=new Notification();
		$n->uid_source=$uid_source;
		$n->message=$message;
//		$n->save();
		//dd($message);
		$message=\GuzzleHttp\json_encode($message);
		event(new notifications($n));
		$redis->publish('m', $message);

		//return redirect('/userHome');

	}


}
