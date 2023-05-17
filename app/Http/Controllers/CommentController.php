<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    // this is to store the comments
    public function store_comment(Request $request){
        $postId = $request->post_id;
        $user = auth::user();
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $validatedData['content'];
        $comment->post_id = $postId;
        $comment->user_id = $user->id;
        $comment->save();
        return response('Comment created successfully!');    }

    public function update_comment(Request $request){
        $user = auth::user();
        $comment_id = $request->comment_id;
        $comment_id = Comment::find($comment_id);
        $user_id = $comment_id->user_id;
        if($user->id == $user_id ){
            // update the post
        }
        return 'updated_comment';

    }

    public function destroy_comment(Request $request){
        $user = auth::user();
        $comment_id = $request->comment_id;
        $comment_id = Comment::find($comment_id);
        $user_id = $comment_id->user_id;
        if($user->id == $user_id ){
            // delete the comment
        }
        return 'deleted_comment';

    }



}
