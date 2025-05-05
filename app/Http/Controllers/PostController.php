<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index (){
        $posts=Post::all();
        return view("posts.index",["posts"=>$posts]);         
    }

    function show($id){
        $post= Post::find($id);
        return view("posts.show",["post"=>$post]);                 
    }

    function create(){        
        return view('posts.create');
    }
    
    function store(StorePostRequest $request){

        $post= new Post($request->validated());
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=Auth::user()->id;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $image->storeAs('storage/images/', $image->getClientOriginalName());
            $post->image = $image->getClientOriginalName();            
        }
                 
        $post->save();

        return redirect()->route('posts.index');
    }

    function edit($id){
        $post=Post::find( $id );
        return view('posts.edit',["post"=>$post]);
    }

    function update($id, StorePostRequest $request){
        // $data= $request->all();

        $post= Post::find( $id );
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$request->user_id;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $post->image = $imageName;  // Update the image name in the database
        }
    

        
        $post->save();

        return redirect()->route('posts.index');
    }

    function destroy($id){
        
        // Post::destroy($id);
        $post=Post::find( $id );
        $post->delete();

        return redirect(route("posts.index"));
    }

}
