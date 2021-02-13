@extends('layouts.app')

@section('content')
    <div class="container w-50 mx-auto">
        @if(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
            </div>
        @elseif(session('status'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <h1>New Blog</h1>
        </div>
        <form action="{{ route('saveblog') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="title">Title :</label>
                <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autocomplete="title" autofocus type="text" name="title" id="title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="category">Category :</label>
                <select name="category" id="category" class="form-control @error('category') is-invalid @enderror ">
                    <option value="">Choose..</option>
                    @if(isset($categories))
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" @if( old('category')  == $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    @endif
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="Photo">Photo :</label>
                <input type="file" name="photo" id="photo" class="form-control-file @error('photo') is-invalid @enderror">
                @error('photo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if ($errors->any() && !$errors->has('photo'))
                    <span role="alert">
                        <strong>Please reupload your photo!</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <label for="story">Story :</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="5">@if( old('description')){{old('description')}}@endif</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <button type="submit" class="btn btn-secondary">Create</button>
            </div>
            
        </form>
    </div>
@endsection