<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\TopStockholders;
use App\Models\LatestQuarterlyReport;
use App\Models\LatestAnnualReport;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;


class InvestorController extends Controller
{
    function uploadInvestor(Request $request)
{
    $file = new Investor;

    try {
        // Check if the file exists
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();

            // Check if the file name already exists in the database
            if (Investor::where('file_name', $name)->exists()) {
                throw ValidationException::withMessages(['file' => 'File name already exists in the database.']);
            }

            $file->file_name = $name;
            $path = $request->file('file')->storeAs('apiFile', $name);
        }

        $file->category = $request->category;
        $file->title = $request->title;

        $result = $file->save();

        if ($result) {
            return ["result" => "Uploaded!"];
        } else {
            return ["result" => "Failed!"];
        }
    } catch (ValidationException $e) {
        // Handle validation exception and return a JSON response
        return response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
    }
}

    public function showInvestor() {
        return Investor::get();
    }

    function uploadStockholders(Request $request){
        $file=new TopStockholders;
     
        try{
            if ($request->hasFile('file')) { 
                $name = $request->file('file')->getClientOriginalName();

                if (TopStockholders::where('file_name', $name)->exists()) {
                    throw ValidationException::withMessages(['file' => 'File name already exists in the database.']);
                }

                $file->file_name = $name;
                $path = $request->file('file')->storeAs('apiFile', $name);
            }

            $file->title = $request->title;
            $result = $file->save();

            if ($result) {
                return ["result" => "Uploaded!"];
            } else {
                return ["result" => "Failed!"];
            }
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }
      
    }

    public function showStockholders() {
        return TopStockholders::get();
    }


    function uploadLar(Request $request){
        $file=new LatestAnnualReport;
     
        try {
            // Check if the file exists
            if ($request->hasFile('file')) {
                $name = $request->file('file')->getClientOriginalName();
    
                // Check if the file name already exists in the database
                if (LatestAnnualReport::where('file_name', $name)->exists()) {
                    throw ValidationException::withMessages(['file' => 'File name already exists in the database.']);
                }
    
                $file->file_name = $name;
                $path = $request->file('file')->storeAs('apiFile', $name);
            }
    
            $file->category = $request->category;
            $file->title = $request->title;
    
            $result = $file->save();
    
            if ($result) {
                return ["result" => "Uploaded!"];
            } else {
                return ["result" => "Failed!"];
            }
        } catch (ValidationException $e) {
            // Handle validation exception and return a JSON response
            return response()->json(['error' => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }
      
    }

    public function showLar() {
        return LatestAnnualReport::get();
    }

}
