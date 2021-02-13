@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
                <div class="alert alert-success row" role="alert">
                    {{ session('status') }}
                </div>
            @endif
    <div class="row w-50 mx-auto justify-content-left">
        @if (isset($category))
            {{$category->name}}
        @else
            All Category
        @endif
    </div>
    @if (isset($articles))
        @if (count($articles) <= 0)
            <div class="row justify-content-left my-2">
                <h2>There's no blog, make one now!</h2>
            </div>
        @endif
        @foreach ($articles->chunk(4) as $articless)
            <div class="row justify-content-left my-2">
                @foreach ($articless as $article)
                    <div class="col-md-3">
                        <div class="card p-3">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text article-desc-home" align="justify">{{$article->description}}</p>
                            <a href="{{ route('detailblog',['id'=>$article->id])}}">See more..</a>
                            @if (Auth::user() && Auth::user()->role == 'admin')
                                <form action="/deleteblog{{$article->id}}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-secondary">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@endsection
