<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\TopStockholders;
use App\Models\LatestQuarterlyReport;
use App\Models\LatestAnnualReport;

class InvestorController extends Controller
{
    function uploadInvestor(Request $request){
        $file=new Investor;
     
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

    public function showInvestor() {
        return Investor::get();
    }

    function uploadStockholders(Request $request){
        $file=new TopStockholders;
     
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);

       
        $file->title = $request->title;
       
        
        $result=$file->save();
        // if($result){
        //     return ["result"=>"Uploaded!"];
        // }else{
        //     return ["result"=>"Failed!"];
        // }
      
    }

    public function showStockholders() {
        return TopStockholders::get();
    }


    function uploadLar(Request $request){
        $file=new LatestAnnualReport;
     
        $file->file_name=$request->file('file')->getClientOriginalName();
        $name=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('apiFile',$name);

        $file->category = $request->category;
        $file->title = $request->title;
       
        
        $result=$file->save();
        if($result){
            return ["result"=>"Uploaded!"];
        }else{
            return ["result"=>"Failed!"];
        }
      
    }

    public function showLar() {
        return LatestAnnualReport::get();
    }

}
