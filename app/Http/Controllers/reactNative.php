<?php

namespace App\Http\Controllers;

use App\testimonial;
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
        $destination='uploads/videos';
        $filename=$request->video->getClientOriginalName();
        if(($request->video->move($destination,$filename)))
        {
            $status=1;
            $message="Thank you, Your video will be posted shortly after review";
            $values=array('status'=>$status,'message'=>$message);
            return (json_encode($values));
        }

        $status=0;
        $message="Please contact Akshay if you see this";
        $values=array('status'=>$status,'message'=>$message);
        return (json_encode($values));
    }

    public function saveTestimonials(Request $request)
    {
        $new=new testimonial();
        $new->name=$request->name;
        $new->text=$request->text;
        $new->image='/images/main.jpg';
        $new->status=0;
        $new->save();
        $values=array('message'=>'Thank you, It will be posted shortly after review');
        return (json_encode($values));
    }
    public function saveTestimonialsWithPhoto(Request $request)
    {
        $new=new testimonial();
        $new->name=$request->name;
        $new->text=$request->text;
        $new->image='uploads/images/'.$request->photo->getClientOriginalName();
        $destination='uploads/images';
        $new->status=0;
        if($request->photo->move($destination,$request->photo->getClientOriginalName()))
        {
            $new->save();
            $values=array('message'=>'Thank you, It will be posted shortly after review');
            return (json_encode($values));
        }
        else {
            $values=array('message'=>'Error: Contact Akshay for this');
            return (json_encode($values));
        }
    }
    public function getTestimonials()
    {
        $records=testimonial::get();
        return \GuzzleHttp\json_encode($records);
    }

}
