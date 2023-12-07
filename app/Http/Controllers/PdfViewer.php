<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PdfViewer extends Controller
{
    //
    public function download(Request $request){

        
        if (Storage::disk('local')->exists("apiFile/$request->file")){
            $path = Storage::disk('local')->path("apiFile/$request->file");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type'=>mime_content_type($path)
            ]);
        }
        return redirect('/404');
    }
}
