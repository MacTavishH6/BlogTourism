@extends('layouts.app')

@section('content')
    <div class="container w-50 mx-auto">
        <div class="row">
            <h2>Welcome {{Auth::user()->name}}</h2>
        </div>
    </div>
@endsection