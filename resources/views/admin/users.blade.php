@extends('admin.layout')

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

    @if($users->count())
        <div class="row">
            <table class="table table-hover bg-light shadow-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>    
                            <td>{{ $user->name }}</td>    
                            <td>{{ $user->email }}</td>    
                            <td>{{ $user->roles[0]->name }}</td>    
                        </tr>                    
                    @endforeach
                </tbody>
            </table>
        </div>
    @else

        <div class="empty-data">There aren't any posts to publish</div>

    @endif
@endsection