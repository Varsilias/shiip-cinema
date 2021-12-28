@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cinema') }}</div>

                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Added</th>
                        <th scope="col">Author</th>
                        <th scope="col" class="text-center">Action</th>
                     

                        </tr>
                    </thead>
                    <tbody>
                    @if(count($cinemas)< 1)
                    <tr>
                    No Cinema Yet
                    </tr>
                    @else
                        @foreach($cinemas as $cinema)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$cinema->name}}</td>
                            <td>{{$cinema->venue}}</td>
                            <td>{{$cinema->created_at->diffForHumans()}}</td>
                            <td>{{$cinema->user->name}}</td>
                            <td class="text-center">
                            <a href="{{route('cinema.edit',$cinema->id)}}"  class="btn btn-primary">Edit</a>||
                            <a href="{{route('cinema.delete',$cinema->id)}}"  class="btn btn-danger">Delete</a>
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
