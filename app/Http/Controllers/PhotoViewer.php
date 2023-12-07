<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoViewer extends Controller
{
    //
    public function image(Request $request){

        
        if (Storage::disk('local')->exists("newsCover/$request->file")){
            $path = Storage::disk('local')->path("newsCover/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type'=>mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
