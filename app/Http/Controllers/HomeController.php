<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function publicMessage(Request $request){
        return response()->json([
            'message' => 'This is a public message'
        ]);
    }

    function privateMessage(Request $request){
        return response()->json([
            'message' => 'This is a private message'
        ]);
    }

    function secretMessage(Request $request){
        return response()->json([
            'message' => 'This is a secret message'
        ]);
    }

    function downloadFile(Request $request){
        return response()->json([
            'message' => 'File Download'
        ]);
    }

    function message(Request $request){
        return response()->json([
            'message' => 'This is a message'
        ]);
    }

    function contentForBD(Request $request){
        $headers = $request->headers->all();
        return response()->json([
            'message' => 'You can see it only from Bangladesh',
            // 'headers' => $headers
        ]);
        // return response()->json([
        //     'message' => 'You can see it only from Bangladesh'
        // ]);
    }
}
