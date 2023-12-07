<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corporate;
use App\Models\Enterprise;
use App\Models\Manual;
 

use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class CorpController extends Controller
{
    function uploadCorp(Request $request){
        $file=new Corporate;
     
        try{
            if ($request->hasFile('file')) { 
                $name = $request->file('file')->getClientOriginalName();

                if (Corporate::where('file_name', $name)->exists()) {
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

    public function showCorp() {
        return Corporate::get();
    }


    function uploadEnterprise(Request $request){
        $file=new Enterprise;
     
        try{
            if ($request->hasFile('file')) { 
                $name = $request->file('file')->getClientOriginalName();

                if (Enterprise::where('file_name', $name)->exists()) {
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

    public function showEnterprise() {
        return Enterprise::get();
    }


    function uploadManual(Request $request){
        $file=new Manual;
     
        try{
            if ($request->hasFile('file')) { 
                $name = $request->file('file')->getClientOriginalName();

                if (Manual::where('file_name', $name)->exists()) {
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

    public function showManual() {
        return Manual::get();
    }

}
