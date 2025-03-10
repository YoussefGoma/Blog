<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(){
        $posts = Post::paginate(10);
        return view('index',['posts'=>$posts]);
    }
    public function create(){
        $users = User::all();
        return view('create',['users'=>$users]);
    }
    public function show($id){
        $post= Post::find($id);
        $user = $post->user;
        $users = User::all();

        return view('show',['post'=>$post,'user'=>$user,'users'=>$users]);
    }
    public function edit($id){
        $post= Post::find($id);
        $users = User::all();
        
        return view('update',['post'=>$post,'users'=> $users]);
    }
    public function store(){
        $title = request()->title;
        $author = request()->author;
        $description = request()->description;
        $post = Post::create([
            'title'=> $title,
            'user_id'=> $author,
            'description'=> $description
        ]);

        return to_route('posts.show',$post->id);
        // return to_route('posts.index');
    }

    public function update($id){
        $post= Post::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->save();
        // return to_route('posts.index');
        return to_route('posts.show',$id);
    }
    public function destroy($id){

        Post::destroy($id);
        return to_route('posts.index');
    }
}
