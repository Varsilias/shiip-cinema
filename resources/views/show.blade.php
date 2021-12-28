@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Added</th>
                        <th scope="col">Author</th>
                        <th scope="col" class="text-center">Action</th>
                     

                        </tr>
                    </thead>
                    <tbody>
                    @if(count($movies)< 1)
                    <tr>
                    No Movies Yet
                    </tr>
                    @else
                        @foreach($movies as $movie)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$movie->name}}</td>
                            <td>{{$movie->created_at->diffForHumans()}}</td>
                            <td>{{$movie->user->name}}</td>
                            <td class="text-center">
                            <a href="{{route('movie.edit',$movie->id)}}"  class="btn btn-primary">Edit</a>||
                            <a href="{{route('movie.delete',$movie->id)}}"  class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
