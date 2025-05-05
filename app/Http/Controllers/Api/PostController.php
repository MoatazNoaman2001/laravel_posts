<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    function index (){
        $posts=Post::all();  
        return PostResource::collection($posts);      
    }

    function show($id){
        $post= Post::find($id);
        return new PostResource($post);      
    }

    function store(StorePostRequest $request){

        $post= new Post($request->validated());
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$request->user_id;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $image->storeAs('storage/images/', $image->getClientOriginalName());
            $post->image = $image->getClientOriginalName();            
        }
                 
        $post->save();

        return "Done";
    }


    function update($id, Request $request){
        // $data= $request->all();

        $post= Post::find( $id );
        $post->title=$request->title;
        $post->body=$request->body;
        
        $post->save();

        return 'Update done';
    }

    function destroy($id){
        
        // Post::destroy($id);
        $post=Post::find( $id );
        $post->delete();

        return "Destroy Done";
    }
}
