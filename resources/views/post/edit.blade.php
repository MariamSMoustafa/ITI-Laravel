@extends('layouts.app')

@section('title')
    Edit
@endsection

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <form method="POST" action="{{route('posts.update',$post['id'])}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <input name="description" class="form-control" id="exampleFormControlInput1" rows="3" value="{{$post['description']}}">
        </div>
        @if($post->image !=null)
        <div class="form-group">
              <label for="user" class="form-label">Image</label>
   
              <input class="form-control" name="image" type="file" id="formFile" >
              <img class="mt-2" src="{{'/'.'storage/'.$post->image}}" width="250" alt=""/>
         </div>
        @endif


        <div class="mb-3">
            <label for="user" class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
            @if(isset($users))
            @foreach($users as $user)
                    @if($user->name == $post->User->name)
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
                @endif

            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
@endsection
