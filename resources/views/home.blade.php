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
                        <th scope="col">Movie Name</th>
                        <th scope="col">Cinema</th>
                        <th scope="col">Show time</th>

                        <th scope="col">Date</th>
                        <!-- <th scope="col">Added</th> -->

                        <th scope="col" class="text-center">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                    @if(count($shows)< 1)
                    <tr>
                    No Movies Yet
                    </tr>
                    @else
                        @foreach($shows as $show)
                            @if(count($show->movies) < 1)
                            <tr>
                            No show
                            </tr>
                            @else
                                @foreach($show->movies as $movie)
                            <tr>
                                <td>{{$loop->parent->index + 1}}</td>
                                <td>{{$movie->name}}</td>
                                <td>{{$show->name}}</td>
                                <td>{{$movie->pivot->time}}</td>
                                <td>{{$movie->pivot->date}}</td>
                                <!-- <td>{{$movie->created_at->diffForHumans()}}</td> -->
                                <td><a href="{{route('show.edit',[$movie->id,$show->id])}}" class="btn btn-primary">Edit</a>||<a href="{{route('show.delete',[$movie->id,$show->id])}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                                @endforeach
                            @endif

                        @endforeach
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
