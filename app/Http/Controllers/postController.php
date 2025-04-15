<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{

    private function getPosts(){
        return $posts = [
            [
                'id' => 1,
                'title' => "post 1",
                'description' => "desc 1",
                'content' => "just simple post for post 1",
            ],
            [
                'id' => 2,
                'title' => "post 2",
                'description' => "desc 2",
                'content' => "just simple post for post 2",
            ],
            [
                'id' => 3,
                'title' => "post 3",
                'description' => "desc 3",
                'content' => "just simple post for post 3",
            ],
        ];
    }
    
    function index($id){
        $post = collect($this->getPosts())->firstWhere('id', $id);
        return view('post', ["post" => $post]);
    }

    function show(){
        return view('posts', ["posts" => $this->getPosts()]);
    }

    function edit($id){
        $posts = $this->getPosts();
        $index = array_search($id , array_column($posts , 'id'));
        return view('postedit' , ['post'=>$posts[$index]]);
    }

    function update($id, Request $request){
        print_r();
        $data = $request->all();
        $posts = $this->getPosts();
        $index = array_search($id , array_column($posts , 'id'));
    
        if ($index !== false){
            $posts[$index]['title'] = request('title' ,$posts[$index]['title']);
            $posts[$index]['content'] = request('content' ,$posts[$index]['content']);
    
            return view('posts', ["posts" => $posts]);
        }
        return resposnse()->json(['msg'=>"cant find " . $id], 404);
    }

    function delete($id){
        $posts = $this->getPosts();
        $index = array_search($id , array_column($posts , 'id'));
    
        if ($index !== false){
            array_splice($posts , $index, 1);
    
            return view('posts', ["posts" => $posts]);
        }
        return resposnse()->json(['msg'=>"cant find " . $id], 404);
    }
}
