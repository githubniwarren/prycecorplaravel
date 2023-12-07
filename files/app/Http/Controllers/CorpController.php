<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corporate;
use App\Models\Enterprise;
use App\Models\Manual;

class CorpController extends Controller
{
    function uploadCorp(Request $request){
        $file=new Corporate;
     
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);

     
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function showCorp() {
        return Corporate::get();
    }


    function uploadEnterprise(Request $request){
        $file=new Enterprise;
     
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);

       
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function shiowEnterprise() {
        return Enterprise::get();
    }


    function uploadManual(Request $request){
        $file=new Manual;
     
        if ($request->hasFile('file')) 
        {
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);
        }
       
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function showManual() {
        return Manual::get();
    }

}
