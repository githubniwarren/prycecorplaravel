<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;

class AboutController extends Controller
{
  
    function uploadArticles(Request $request){
        $file = new Articles;
     
        $file->title = $request->title;
    
        if ($request->hasFile('file')) {
            $file->file_name = $request->file('file')->getClientOriginalName();
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs('apiFile',$name);
        }
            
        $result = $file->save();
        
        if ($result) {
            return ["result"=>"Uploaded!"];
        } else {
            return ["result"=>"Failed!"];
        }
    }
    
    

    public function showArticles() {
        return Articles::get();
    }
}
