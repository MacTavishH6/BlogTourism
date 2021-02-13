@extends('layouts.app')

@section('content')
    <div class="container w-50 mx-auto">
        <div class="row justify-content-center">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="#" method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-secondary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection