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
                <td>{{$post['id']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <!-- <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a> -->
                    <x-button type="primary" :href="route('posts.show',$post['id'])">View</x-button>
                    <x-button type="secondary" :href="route('posts.edit',$post['id'])">Edit</x-button>
                    <x-button type="danger">Delete</x-button>
                </td>
            </tr>
        @endforeach



        </tbody>
    </table>

@endsection