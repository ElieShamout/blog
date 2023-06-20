@extends('layouts.app')

@section('style')

    <style>
        .create-post-form{
            width:60%;
            margin:100px auto 0 auto;
            min-width: 60vh;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .card-image{
            min-height:400px;
            max-height:400px;
            overflow: hidden;
        }

        .card-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
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

<h1 class="my-4 text-center">Show post</h1>
    <div class="create-post-form">
        @if(isset($post))
            <div class="card" style="width: 100%;">
                <div class="card-image">
                    @if($post->image!=='')
                        <img src='{{ asset("images/posts/$post->image") }}' alt="" class="card-img-top">
                    @else
                        <img src='{{ asset("images/posts/no-image.png") }}' alt="" class="card-img-top">
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <h4 class="card-text">{{ $post->body }}</h4>
                        <div class="d-flex">
                            @role('writer')
                            <a href="{{ url('post/edit' , $post->id) }}" class="btn btn-primary me-2">Edit</a>
                            <form action="{{ url('post/delete' , $post->id) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endrole

                            @role('user')
                            <a href="{{ url('post/edit' , $post->id) }}" class="btn btn-primary me-2">Like</a>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="empty-data">Post not found</div>
        @endif
    </div>
        
    
    
@endsection

