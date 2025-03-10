<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($postId)
    {
        // $comment = new Comment(['content'=>request()->content,'user_id' =>request()->author]);
 
        $post = Post::find($postId);

        
        $post->comments()->create(['content'=>request()->content,'user_id' =>request()->author]);
        return to_route('posts.show',$postId);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        $users=User::all();
        return view('updateComment',['comment'=>$comment,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->content = request()->content;
        $comment->save();
        return to_route('posts.show',$comment->commentable_id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Comment::destroy($id);
        return to_route('posts.index');
    }
}
