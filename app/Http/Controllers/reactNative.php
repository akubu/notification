<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class reactNative extends Controller
{
    public function insert(Request $request)
    {
        if($request->id){
            Note::where('id','=',$request->id)
                ->update([
                    'title'=>$request->title,
                    'text'=>$request->text
                        ]);

            return ($request->id);
        }
        $note= new Note;
        $note->title=$request->title;
        $note->text=$request->text;
        $note->save();
        return($request->text);
    }
    public function delete(Request $request)
    {
        Note::where('id','=',$request->id)->delete();
        return ($request->id . 'deleted');
    }
    public function getNotes()
    {
        return(\GuzzleHttp\json_encode(Note::all()));
    }

    public function upload(Request $request)
    {
        if( !$request->hasFile('fileToUpload'))
        {
            $status=0;
            $message="Please select video to upload";
            $values=array('status'=>$status,'message'=>$message);
            return (json_encode($values));
        }
        $size = Input::file('fileToUpload')->getSize();
        $filename=$request->file('fileToUpload')->getClientOriginalName();
        $fileext=$request->file('fileToUpload')->getClientOriginalExtension();
        $destination='uploads';
        if(!$request->file('fileToUpload')->isValid())
        {
            $status="0";
            $message='File is not valid';
            $values=array('status'=>$status,'message'=>$message);
            return (json_encode($values));
        }


        if(($request->file('fileToUpload')->move($destination,$filename)))
        {
            $status=1;
            $message="Thank you, Your video will be posted shortly";
            $values=array('status'=>$status,'message'=>$message);
            return (json_encode($values));
        }
        $status=0;
        $message="Please contact Akshay if you see this";
        $values=array('status'=>$status,'message'=>$message);
        return (json_encode($values));
    }

}
