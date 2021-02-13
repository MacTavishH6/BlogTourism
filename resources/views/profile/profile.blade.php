@extends('layouts.app')

@section('content')
    <div class="container w-50 mx-auto">
        <form action="{{ route('updateprofile') }}" method="post">
            @csrf
            <div class="form-group row">
                <label for="name">Name :</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="@if(isset($user)){{$user->name}}@endif" @if (Auth::user() && Auth::user()->role == 'admin') readonly @endif>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="@if(isset($user)){{$user->email}}@endif" @if (Auth::user() && Auth::user()->role == 'admin') readonly @endif>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="phone">Phone :</label>
                <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="@if(isset($user)){{$user->phone}}@endif" @if (Auth::user() && Auth::user()->role == 'admin') readonly @endif>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                @if (Auth::user() && Auth::user()->role != 'admin')
                    <button type="submit" class="btn btn-secondary">Update</button>
                @endif
            </div>
        </form>
    </div>
@endsection