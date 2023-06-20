@extends('layouts.app')

@section('style')

    <style>
        .create-post-form{
            width:60%;
            margin:100px auto 0 auto;
        }
    </style>

@endsection


@section('content')

    <div class="create-post-form bg-light shadow rounded">
        <form method="post" action="{{ url('post/create') }}" class="p-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1">
                @if($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Body</label>
                <textarea  name="body" class="form-control" cols="30" rows="3"></textarea>
                @if($errors->has('body'))
                    <div class="text-danger">{{ $errors->first('body') }}</div>
                @endif
            </div>
            <div class="mb-4">
                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
                @if($errors->has('image'))
                    <div class="text-danger">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection


