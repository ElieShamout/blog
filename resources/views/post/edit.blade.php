@extends('layouts.app')

@section('style')

    <style>
        .create-post-form{
            width:60%;
            margin:100px auto 0 auto;
            padding:20px;
        }

        .empty-data{
            margin: auto;
            width: 100%;
            height:65vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }
    </style>

@endsection


@section('content')

    <div class="create-post-form bg-light shadow rounded">
        @if(isset($post))
        <h1 class="my-4 text-center">Edit post</h1>
            <form method="post" action="{{ url('post/edit') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Body</label>
                    <textarea  name="body" class="form-control" cols="30" rows="3">{{ $post->body }}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        @else
            <div class="empty-data">Post not found</div>
        @endif
    </div>
        
    
@endsection