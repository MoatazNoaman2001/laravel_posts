<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $post = Post::find($id);
        return view('post' , [
            "post"=>$post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "done2";

        $users=User::all();
        return view('createPost', ['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
       return "done";
        // return view("posts" , ['posts'=>$posts]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $posts = Post::with('user')->get();
        return view("posts" , [
            "posts"=> $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('postedit' , ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id);

        $validated = $request->validated();

    
        if ($post !== false){
            $affected = DB::update(
                'update post set title = ? where content = ?',
                [$request->title, $request->content]
            );
    
            return view('posts', ["posts" => $posts]);
        }
        return resposnse()->json(['msg'=>"cant find " . $id], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::delete('delete from post where id=' . $id);
        $posts = Post::All();
        return view("posts" , [
            "posts"=> $posts
        ]);
    }
}
