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

    public function displayReels(){
        $posts = Post::orderBy('id','desc')
        ->where('type', 'reel')
        ->get();
        return view('reels', compact('posts'));
    }

    public function displayArchives(){
        $posts = Post::orderBy('id','desc')
        ->where('type', 'archive')
        ->get();
        return view('archives', compact('posts'));
    }
}
