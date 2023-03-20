@extends('layouts.app')


@section('title') Index @endsection

@section('content')
    <div class="text-center">
        <a  class="mt-4 btn btn-success"  href="{{route('posts.create')}}" >Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>   <!-- or $post['id'] -->
                <td>{{$post->title}}</td>
                @if($post->user)
                <td>{{$post->user->name}}</td>
                @else
                 <td>Not Found</td>
                @endif
                <td>{{\Carbon\Carbon::parse($post->created_at)->toDateString();}}</td>
                <td>

                    <!-- <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                    <a class="btn btn-danger" href="{{route('posts.destroy',$post['id'])}}" >Delete</a> -->
                    
                   
                   
                                                  <!-- Bonus -->
                    <x-button type="primary" :href="route('posts.show',$post['id'])">View</x-button>
                    <x-button type="secondary" :href="route('posts.edit',$post['id'])">Edit</x-button>
                    <form method="POST" action="{{route('posts.destroy',$post['id'])}}" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?')">
                       @method('DELETE')
                       @csrf
                    <button type="submit" class="btn btn-danger" value="">Delete</button>
                </form>
                </td>
            </tr>
        @endforeach


        {{$posts->links()}}

        </tbody>
    </table>

@endsection