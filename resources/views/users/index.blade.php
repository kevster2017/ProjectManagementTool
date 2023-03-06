@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Users</li>
        </ol>
    </nav>
</div>
<h1 class="text-center mb-3"><label for="allusers" class="form-label"><strong>All Users</strong></label></h1>

<div class="container">
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
</div>

<div class="container mt-2 d-flex justify-content-center">

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">User ID</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Is Admin?</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)


            <tr>

                <th>{{ $user->id }}</th>
                <th scope="row"> <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></th>
                <td>{{ $user->userID }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ date('d-m-Y', strtotime($user->created_at));  }}</td>

                @if($user->isAdmin == 1)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
            </tr>


            @endforeach


        </tbody>
    </table>



</div>

@endsection