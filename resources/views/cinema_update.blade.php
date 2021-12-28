@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' Update Cinema') }}</div>

                <div class="card-body">
                <form method="post">
                            @csrf
                            <!-- Default input name -->
                            <label for="defaultFormNameModalEx">Name</label>
                            <input type="text" id="defaultFormNameModalEx"  class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{$cinema->name}}" name="name" required>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <br>
                            <label for="defaultFormNameModalEx">Venue</label>
                            <input type="text" name="venue" id="defaultFormNameModalEx"  class="form-control form-control-sm @error('venue') is-invalid @enderror" value="{{$cinema->venue}}"  required>
                            @error('venue')
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
