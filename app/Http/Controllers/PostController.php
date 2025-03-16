<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(){
        $posts = Post::withTrashed()->paginate(10);
        return view('index',['posts'=>$posts]);
    }
    public function create(){
        $users = User::all();
        return view('create',['users'=>$users]);
    }
    public function show($slug){
        $post= Post::with(['user'])->withTrashed()->where('slug', $slug)->firstOrFail();
        // $user = $post->user;
        // $users = User::all();
        return response()->json($post);
    }
    public function edit($id){
        $post= Post::find($id);
        $users = User::all();
        
        return view('update',['post'=>$post,'users'=> $users]);
    }
    public function store(StorePostRequest $request){
        $validated = $request->validated();

        $postData = [
            'title' => $validated['title'],
            'user_id' => $validated['author'],
            'description' => $validated['description'],
        ];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $postData['image'] = $imagePath;
        }
    
    $post = Post::create($postData);
    
    return to_route('posts.show', $post->slug);
    }

    public function update(UpdatePostRequest $request,$id){
        $post = Post::findOrFail($id);
        $validated = $request->validated();

        $postData = [
            'title' => $validated['title'],
            'description' => $validated['description'],
        ];
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $postData['image'] = $imagePath;
        }

        $post->update($postData);

        return to_route('posts.show', $post->slug);
    }
    public function destroy($id){
        Post::destroy($id);
        return to_route('posts.index');
    }
    public function restore($id){
        $post= Post::onlyTrashed()->find($id);
        $post->restore();
        // return response()->json($post);

        return to_route('posts.show', $post->slug);
    }
    public function forceDestroy($id){
        $post= Post::onlyTrashed()->find($id);
        $post->forceDelete();
        return to_route('posts.index');
    }
    public function getDeletedPosts(){
        $posts= Post::onlyTrashed()->get();
        return to_route('posts.index',$posts);
    }
    public function getUserDeletedPosts($userId){
        $posts= Post::onlyTrashed()->where('user_id', $userId)->get();
        return to_route('posts.index',$posts);
    }
}
