<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class user extends Controller
{
    public function index()
    {
        $username=Auth::user()->email;
        $not=Notification::where('uid_target','=',$username)->where('status','=','un_read')->get();
//        dd($not[0]->message);
        return view('dashboard',compact('username','not'));
    }

    public function listen()
    {
        $username=Auth::user()->email;
        return view('a',compact('username'));
    }

    public function upload(Request $request)
    {


        $errorcode="NA";
        $status="uploaded";
        if( !$request->hasFile('fileToUpload'))
        {
            $errorcode="file not found";
            $status="failed";
            $values=array('errorcode'=>$errorcode,'status'=>$status);
            return (json_encode($values));
            //return $request->file('fileToUpload')->getClientOriginalName();
            //return 'true';
        }
        $size = Input::file('fileToUpload')->getSize();
        $filename=$request->file('fileToUpload')->getClientOriginalName();
        $fileext=$request->file('fileToUpload')->getClientOriginalExtension();
        $destination='Downloads';
        if(!$request->file('fileToUpload')->isValid())
        {
            $errorcode="incomplete file";
            $status="failed";
            $values=array('errorcode'=>$errorcode,'status'=>$status,array('filename'=>$filename,'fileext'=>$fileext,'filesize'=>$size));
            return (json_encode($values));
        }
        if($fileext=="php" || $fileext=="html")
        {
            $errorcode="Invalid file format";
            $status="failed";
            $values=array('errorcode'=>$errorcode,'status'=>$status,array('filename'=>$filename,'fileext'=>$fileext,'filesize'=>$size));
            return (json_encode($values));

        }
        if($size>1500)
        {
            $errorcode="choose a smaller file";
            $status="failed";
            $values=array('errorcode'=>$errorcode,'status'=>$status,array('filename'=>$filename,'fileext'=>$fileext,'filesize'=>$size));
            return (json_encode($values));

        }
        // dd(User::where('email' ,'=' ,'akubuzz@gmail.com')->pluck('name'));
        //dd($this->auth->getUser()->email);
        if(($request->file('fileToUpload')->move($destination,$filename)))
        {

            $values=array('errorcode'=>$errorcode,'status'=>$status,'data'=>array('filename'=>$filename,'fileext'=>$fileext,'filesize'=>$size));
//            Mail::send('email.sendmail',['data'=>json_encode($values)],function ($message){
//                $message->from('akshay.singh@power2sme.com','laravel');
//                $message->to('akshay.singh@power2sme.com');
//                $message->subject('File Uploaded');
//                $path='Downloads/fn.js';
//                $message->attach($path);



//            });

//            $file=new ;
//            $file->name=$filename;
//            $file->username=$this->auth->getUser()->email;
//            $file->save();
//            fileCount::count();
            //return redirect('/');
            //return View::make('/')->with('count'=>)
            //event(new ActionDone());
            return (json_encode($values));
            //return $values;
        }
        $errorcode="failed to upload";
        $status="Failed";
        $values=array('errorcode'=>$errorcode,'status'=>$status,array('filename'=>$filename,'fileext'=>$fileext,'filesize'=>$size));
        //return (json_encode($values));
    }
    //
}
