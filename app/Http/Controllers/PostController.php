<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostName;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
                             ////////Index////////
     public function index()
    {
        //query to select * from posts

        // $allPosts = Post::all();

        //To paginate
        $allPosts = Post::paginate(10);
       return view('post.index',['posts' => $allPosts]);
    }


                             ////////Show////////
    public function show($id)
    {
        $post = Post::find($id); //select * from posts where id=1 limit 1; //ِawel result

         //$postCollection =Post::where('id',$id)->get();  //collection object
         //$post = Post::where('id',$id)->first();  //post model object /select * from posts where id=1 limit 1;
        //  dd($post);

        $comments = $post->comments;
        return view('post.show', ['post' => $post,'comments'=>$comments]);
    }


                            ////////Create////////
    public function create(){
        $users = User::all();
         
         //dd($users);
        return view('post.create',['users' => $users]);
    }



                            ////////Edit////////
    public function edit($id){

        $post = Post::find($id);
        $users = User::all();
        return view('post.edit',['post' => $post,'users' =>$users]);
    }


                            ////////Update////////
    public function update($id, UpdatePostName $request)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->user_id = $request->input('post_creator');
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk("public")->delete($post->image);
            }
                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $path = Storage::disk("public")->putFileAs('posts', $image, $filename);
                $post->image = $path;
                
        }

        $post->save();
        return redirect()->route('posts.index');
    }


                            ////////Store////////
    public function store(StorePostRequest $request){

        $title = request()->title;
        $description = request()->description;
        $postCreator =request()->post_creator;
        $slug =request()->slug;
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $path = Storage::disk("public")->putFileAs('posts', $image, $filename);

            Post::create([

                'title' => $title,
                'description' => $description,
                'user_id' => $postCreator,
                'slug' =>$slug,
                'image'=>$path
    
            ]);
        }else{
            Post::create([

                'title' => $title,
                'description' => $description,
                'user_id' => $postCreator,
                'slug' =>$slug,
    
            ]);
        }

        //insert the form data in database


        return to_route('posts.index');

    }


                            ////////Destroy////////
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

}