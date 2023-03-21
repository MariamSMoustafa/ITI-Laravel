<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostName;

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

        $post->save();
        return redirect()->route('posts.index');
    }


                            ////////Store////////
    public function store(StorePostRequest $request){

        //Validation There is another way by class i can call in any place so i'll make request 

        // $request->validate([
            // 'title' =>['required', 'min:3'],
            // 'description' =>['required','min:5']
        // ],[
        //       'title.required'=>'my custom message',
        //      'title.min' => 'minimum custom message'
        // ]);
        

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


                            ////////Destroy////////
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

}