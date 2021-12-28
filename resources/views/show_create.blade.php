@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Create ShowTime') }}</div>

                <div class="card-body">
                    <form method="post">
                            @csrf
                            <!-- Default input name -->
                            <label for="defaultFormNameModalEx">Movie Name</label>
                            <select type="text" id="defaultFormNameModalEx" class="form-control form-control-sm @error('movie_id') is-invalid @enderror" name="movie_id" value="{{old('movie_id')}}" required>
                                <option>[Please Select]</option>
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
                            <select type="text" id="defaultFormNameModalEx" name="cinema_id" class="form-control form-control-sm @error('cinema_id')  is-invalid @enderror" value="{{old('cinema_id')}}" required>
                                <option>[Please Select]</option>
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
                            <input type="date" name="date" id="defaultFormNameModalEx" class="form-control form-control-sm @error('date') is-invalid @enderror" value="{{old('date')}}" required>
                            @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror     
                            <br>
                            <label for="defaultFormNameModalEx">Time</label>
                            <input type="time" name="time" id="defaultFormNameModalEx" class="form-control form-control-sm @error('time') is-invalid @enderror" value="{{old('time')}}" required>
                            @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-md">Submit </button>
                            </div>

                        </form> 
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
