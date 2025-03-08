<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(){
        $posts = [
            ['id'=>1,'author'=>['name'=>'Youssef','email'=>'Youssef.goma.k@gmail.com'],'title'=>'Hello','desc'=>'hello from first post','created_at' => '2025-03-08 12:47:00'],
            ['id'=>2,'author'=>['name'=>'Ahmed','email'=>'Ahmed@gmail.com'],'title'=>'second','desc'=>'hello from  post','created_at' => '2025-01-07 05:47:00'],
            ['id'=>3,'author'=>['name'=>'Ali','email'=>'ali@gmail.com'],'title'=>'third','desc'=>'hello from  post','created_at' => '2025-03-05 12:47:00']
        ];
        return view('index',['posts'=>$posts]);
    }
    public function create(){
        return view('create');
    }
    public function show($id){
        $post= null;
        $posts = [
            ['id'=>1,'author'=>['name'=>'Youssef','email'=>'Youssef.goma.k@gmail.com'],'title'=>'Hello','desc'=>'hello from first post','created_at' => '2025-03-08 12:47:00'],
            ['id'=>2,'author'=>['name'=>'Ahmed','email'=>'Ahmed@gmail.com'],'title'=>'second','desc'=>'hello from  post','created_at' => '2025-01-07 05:47:00'],
            ['id'=>3,'author'=>['name'=>'Ali','email'=>'ali@gmail.com'],'title'=>'third','desc'=>'hello from  post','created_at' => '2025-03-05 12:47:00']
        ];
        foreach ($posts as $p) {
            if ($p['id'] == $id) {
                $post = $p;
                break;
            }
        }
        // return $post;
        return view('show',['post'=>$post]);
    }
    public function edit($id){
        $post= null;
        $posts = [
            ['id'=>1,'author'=>['name'=>'Youssef','email'=>'Youssef.goma.k@gmail.com'],'title'=>'Hello','desc'=>'hello from first post','created_at' => '2025-03-08 12:47:00'],
            ['id'=>2,'author'=>['name'=>'Ahmed','email'=>'Ahmed@gmail.com'],'title'=>'second','desc'=>'hello from  post','created_at' => '2025-01-07 05:47:00'],
            ['id'=>3,'author'=>['name'=>'Ali','email'=>'ali@gmail.com'],'title'=>'third','desc'=>'hello from  post','created_at' => '2025-03-05 12:47:00']
        ];
        foreach ($posts as $p) {
            if ($p['id'] == $id) {
                $post = $p;
                break;
            }
        }
        // return $post;
        return view('create',['post'=>$post]);
    }
    public function store(){


        return to_route('posts.index');
    }

    public function update(){
        return 'to be implemented';


        // return to_route('posts.index');
    }
    public function destroy(){


        return to_route('posts.index');
    }
}
