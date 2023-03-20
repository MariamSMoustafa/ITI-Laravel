<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //query to select * from posts
        // $allPosts = Post::all();
        //To paginate
        $allPosts = Post::paginate(10);
       return view('post.index',['posts' => $allPosts]);
    }


    public function show($id)
    {
        $post = Post::find($id); //select * from posts where id=1 limit 1; //ِawel result

         //$postCollection =Post::where('id',$id)->get();  //collection object
         //$post = Post::where('id',$id)->first();  //post model object /select * from posts where id=1 limit 1;
        //  dd($post);

        $comments = $post->comments;
        return view('post.show', ['post' => $post,'comments'=>$comments]);
    }

    public function create(){
         $users = User::all();
         
         //dd($users);
        return view('post.create',['users' => $users]);
    }

    public function edit($id){

        $post = Post::find($id);
        $users = User::all();
        return view('post.edit',['post' => $post,'users' =>$users]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = request()->title;
        $post->description = request()->description;
        $post->user_id = request()->post_creator;
        $post->save();
        return redirect()->route('posts.index');
    }

    public function store(Request $request){
        $title = request()->title;
        $description = request()->description;
        $postCreator =request()->post_creator;

        //insert the form data in database
        Post::create([

            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator

        ]);

        return to_route('posts.index');

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

}