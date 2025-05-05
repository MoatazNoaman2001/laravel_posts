<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{    
    function index (){
        $users=User::all();  
        return userResource::collection($users);      
    }

    function show($id){
        $user= User::find($id);
        return new userResource($user);      
    }

    function store(StoreuserRequest $request){

        $user= new User($request->validated());
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');            
            $image->storeAs('storage/images/', $image->getClientOriginalName());
            $user->image = $image->getClientOriginalName();            
        }
                 
        $user->save();

        return "Done";
    }


    function update($id, Request $request){
        // $data= $request->all();

        $user= User::find( $id );
        $user->name=$request->name;
        $user->email=$request->email;
        
        $user->save();

        return 'Update done';
    }

    function destroy($id){
        
        // user::destroy($id);
        $user=User::find( $id );
        $user->delete();

        return "Destroy Done";
    }
}