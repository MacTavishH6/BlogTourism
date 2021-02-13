@extends('layouts.app')

@section('content')
    <div class="container w-50 mx-auto">
        <div class="d-flex flex-column">
            @if (session('status'))
                <div class="alert alert-success row" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row mb-2">
                <a href="{{ route('createblog') }}" class="btn btn-secondary">Create Blog</a>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($articles) || count($articles) <= 0)
                            <tr><td colspan="2" class="text-center">No Articles</td></tr>
                        @else
                            @foreach ($articles as $article)
                                <tr>
                                    <td><a href="{{ route('detailblog',['id'=>$article->id])}}">{{$article->title}}</a></td>
                                    <td>
                                        <form action="/deleteblog{{$article->id}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-secondary">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection