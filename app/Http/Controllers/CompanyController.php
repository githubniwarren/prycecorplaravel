<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;



class CompanyController extends Controller
{
    //

    function upload(Request $request){
        $file=new File;
     
        try {
            // Check if the file exists
            if ($request->hasFile('file')) {
                $name = $request->file('file')->getClientOriginalName();
    
                // Check if the file name already exists in the database
                if (File::where('file_name', $name)->exists()) {
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

    public function show() {
        return File::get();
    }







}
