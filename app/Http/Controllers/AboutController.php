<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class AboutController extends Controller
{
  
    function uploadArticles(Request $request){
        $file = new Articles;
        try{
            if ($request->hasFile('file')) { 
                $name = $request->file('file')->getClientOriginalName();

                if (Articles::where('file_name', $name)->exists()) {
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
    
    

    public function showArticles() {
        return Articles::get();
    }
}
