<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
// this is to store ths posts
    public function store_post(Request $request){
        $user = auth::user();
        Log::info($user);
//        // Validate the request data
//        $validatedData = $request->validate([
//            'title' => 'required|string',
//            'content' => 'required|string',
//        ]);
//
//        // Create a new post instance
//        $post = new Post();
//        $post->title = $validatedData['title'];
//        $post->content = $validatedData['content'];
//        $post->user_id = $user->id;
//        $post->save();

        //  store the post paylod into table as i am using browser i kept the all request as get
        return 'inserted_post'.$user;

    }
    public function update_post(Request $request){
        $user = auth::user();
        $post_id = $request->post_id;
        $post = Post::find($post_id);
        $user_id = $post->user_id;
        if($user->id == $user_id ){
            // update the post
        }
        return 'updated_post';

    }
    public function destroy_post(Request $request){

        $user = auth::user();
        $post_id = $request->post_id;
        $post = Post::find($post_id);
        $user_id = $post->user_id;
        if($user->id == $user_id ){
            // delete the post
        }
        return 'deleted_post'.$user;

    }
}
