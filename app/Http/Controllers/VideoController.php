<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function redirectToVideoView(Request $request)
    {
        $url = $request->input('url');
        return view('video', ['url' => $url]);
    }
}
