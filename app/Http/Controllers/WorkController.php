<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WorkController extends Controller
{
    public function displayWork(){
        $posts = Post::orderBy('id','desc')->get();
        return view('work', compact('posts'));
    }
}
