@extends('layouts.app')

@section('content')
    <div class="container w-25 mx-auto">
        <div class="row justify-content-center mb-3">
            <div class="card p-3" style="max-width: 500px">
                <h5 class="card-title">{{$article->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Category : {{$article->category->name}}</h6>
                <img class="card-img-top" src="{{asset('storage/img/'.$article->image)}}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text" align="justify">{{$article->description}}</p>
                </div>
            </div>
        </div>
        <div class="row @if (Auth::user() && Auth::user()->role == 'admin') d-flex justify-content-between @endif">
            <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
            @if (Auth::user() && Auth::user()->role == 'admin')
                <form action="/deleteblog{{$article->id}}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-secondary">Delete</button>
                </form>
            @endif
        </div>
    </div>
@endsection