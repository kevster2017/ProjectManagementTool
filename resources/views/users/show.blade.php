@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
        </ol>
    </nav>
</div>

<h1 class="text-center mb-3"><label for="userName"" class=" form-label"><strong>{{ $user->name }}'s Profile</strong></label></h1>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><label>User Information</label></h5>
        </div>
        <div class="card-body">

            <div class="container mt-2 d-flex justify-content-center">
                <div class="col">
                    <label>Account ID: </label> {{ $user->id}}
                </div>

                <div class="col">
                    <label>User ID: </label> {{ $user->userID}}
                </div>

            </div>

            <div class="container mt-5 d-flex justify-content-center">

                <div class="col">
                    <label>Email Address: </label> {{ $user->email}}
                </div>

                <div class="col">
                    @if($user->isAdmin == 0)
                    <label>Admin Rights: </label> No
                    @else
                    <label>Admin Rights: </label> Yes
                    @endif
                </div>

            </div>


            <div class="container mt-5 mb-2 d-flex justify-content-center">
                <div class="col-6">
                    <label>Account Created: </label> {{ $user->created_at}}
                </div>

                <div class="col-6">
                    <label>Account Modified: </label> {{ $user->updated_at}}
                </div>
            </div>

        </div>
    </div>
</div>


<div class="container mt-5 d-flex justify-content-center">
    <a href=" {{ route('users.edit', $user->id) }}" class=" btn btn-primary me-3 ">Edit user</a>
    <a href=" {{ route('users.destroy', $user->id) }}" class=" btn btn-danger ">Delete user</a>
</div>


@endsection