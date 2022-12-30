<?php

namespace App\Http\Controllers\Post;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   

    public function index(){
        $posts = Post::orderBy('id','desc')->get();
        return view("dashboard", compact('posts'));
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|max:255',
            'url' => 'required|max:255',
          ]);
          try{
                $post = new Post;
                $post->name = $request->name;
                $post->type = $request->type;
                $post->url = $request->url;
                
                $post->save();

                return redirect()->route('posts.index')
                ->with('success','Post registrado correctamente!');
            }catch(\Exception $e){
                return redirect()->route('posts.index')
                ->with('error','No se pudo registrar el post. Error: '.$e->getMessage());
            }
          
    }

    public function destroy($id){

        try{
             $post = Post::findOrFail($id);
           
             $post->delete();

            return redirect()->route('posts.index')
            ->with('success','Post eliminado correctamente!');
       
        }catch(\Exception $e){

            return redirect()->route('posts.index')
            ->with('error','No se pudo eliminar el post. Error: '.$e->getMessage());
        }
      

    }


}