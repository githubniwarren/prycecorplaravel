<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;



class CompanyController extends Controller
{
    //

    function upload(Request $request){
        $file=new File;
     
        if ($request->hasFile('file')) 
        {
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);
        }

        $file->category = $request->category;
        // $file->subcategory = $request->subcategory;
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function show() {
        return File::get();
    }







}
