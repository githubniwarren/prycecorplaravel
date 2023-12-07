<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
     function uploadNews(Request $request){
        $file=new News;
     
        // $file->cover=$request->file('file')->getClientOriginalName();
        // $name=$request->file('file')->getClientOriginalName();
        // $path=$request->file('file')->storeAs('newsCover',$name);
        // $path=$request->file('file')->store('photo');

        $file->category = $request->category;
        $file->title = $request->title;
        $file->description = $request->description;
        $file->date = $request->date;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function showNews() {
        return News::get();
    }
}
