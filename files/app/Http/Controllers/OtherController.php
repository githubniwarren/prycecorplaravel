<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Other;

class OtherController extends Controller
{
    function uploadOtherDisclosures(Request $request){
        $file=new Other;
     
        if ($request->hasFile('file')) 
        {
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);
        }
        
        $file->category = $request->category;
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function showOtherDisclosures() {
        return Other::get();
    }

}
