@extends('layouts.app')

@section('style')

    <style>
        .card-image{
            min-height:200px;
            max-height:200px;
            overflow: hidden;
        }

        .card-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .card-text{
            overflow: hidden;
            white-space: nowrap; 
            text-overflow: ellipsis;
        }
        .empty-data{
            margin: auto;
            width: 100%;
            height:85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }
    </style>

@endsection


@section('content')

    <h1 class="my-4 text-center">Unpublished post</h1>
    
    @if($posts->count())
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-4 mb-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="card-image">
                        @if(isset($post->image))
                            <img src='{{ asset("images/posts/$post->image") }}' alt="" class="card-img-top">
                        @else
                            <img src='{{ asset("images/posts/no-image.png") }}' alt="" class="card-img-top">
                        @endif
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <h4 class="card-text">{{ $post->body }}</h4>

                        <a href="{{ url('post/show' , $post->id) }}" class="btn btn-primary">Visite</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else

        <div class="empty-data">There aren't any posts</div>

    @endif
@endsection