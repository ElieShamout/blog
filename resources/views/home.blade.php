@extends('layouts.app')

@section('style')

<style>
    .welcome{
        font-size: 50px;
        height:85vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center welcome">
        Welcome to the blog
    </div>
</div>
@endsection
