@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-6 m-5">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}}</h5>
            <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>

    <div class="card mt-6 m-5">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
    </div>

    <div class="card">
    <div class="card-header">
        Comments
    </div>
    <div class="card-body">
        <form
            action="{{route('comments.store', ['user_id' => Auth::id(), 'commentable_id' => $post['id'], 'commentable_type' => get_class($post)])}}"
            method="POST">
            @csrf
            
            <div class="form-group">
                <textarea name="body" id="body" cols="15" rows="4" class="form-control"
                    placeholder="Your comment here"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>
        @if(isset($comments))
        @foreach($comments as $comment)
        <div class="card">
            <div class="card-header">
                {{$post->user->name}}
            </div>
            <div class="card-body">
                <div>
                    <span style="font-size: 1.2rem; font-weight: bold">Comment: </span>
                    {{$comment->body}}
                </div>
                <div>
                    <span style="font-size: 1rem; font-weight: bold">Created At: </span>
                    {{ \Carbon\Carbon::parse($comment->created_at)->format('l jS \\of F Y h:i:s A') }}
                </div>
                <div>
                    <span style="font-size: 1rem; font-weight: bold">By: </span>
                    
                    {{ $post->user->name }}
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <form method="POST" action="{{ route('comments.update', $comment) }}" id="edit-comment-form-{{$comment->id}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="body">Comment</label>
            <textarea class="form-control" id="body" name="body" rows="3">{{$comment->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endforeach
    @else
    <div>No comments yet</div>
    @endif
    
@endsection