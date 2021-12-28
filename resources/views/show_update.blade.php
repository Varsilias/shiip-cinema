@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Update Show time') }}</div>

                <div class="card-body">
                <form method="post">
                            @csrf
                            <!-- Default input name -->
                            <label for="defaultFormNameModalEx">Movie Name</label>
                            <select type="text" id="defaultFormNameModalEx" class="form-control form-control-sm @error('movie_id') is-invalid @enderror" name="movie_id" value="{{$show->movie_id}}" required>
                            <option value="{{$show->id}}">{{$show->name}}</option>
                                @if(count($movie)>0)
                                    @foreach($movie as $move)
                                        <option value="{{$move->id}}">{{$move->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('movie_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            <br>

                            <label for="defaultFormNameModalEx">Cinema</label>
                            <select type="text" id="defaultFormNameModalEx" name="cinema_id" class="form-control form-control-sm @error('cinema_id')  is-invalid @enderror" value="{{$show->cinema_id}}" required>
                            <option value="{{$single_cinema->id}}">{{$single_cinema->name}}</option>
                                @if(count($cinema)>0)
                                    @foreach($cinema as $move)
                                        <option value="{{$move->id}}">{{$move->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('cinema_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                            <br>
                            <label for="defaultFormNameModalEx">Date</label>
                            <input type="date" name="date" id="defaultFormNameModalEx" class="form-control form-control-sm @error('date') is-invalid @enderror" value="{{$show->pivot->date}}" required>
                            @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                            <br>
                            <label for="defaultFormNameModalEx">Time</label>
                            <input type="time" name="time" id="defaultFormNameModalEx" class="form-control form-control-sm @error('time') is-invalid @enderror" value="{{$show->pivot->time}}" required>
                            @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-md">Submit </button>
                            </div>

                        </form>                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
