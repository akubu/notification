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
        $file=Input::file('file');
        return $file->move('uploads',$file->getClientOriginalName());
    }

}
