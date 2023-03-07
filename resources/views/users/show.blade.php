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

    @if(auth()->check() && auth()->user()->isAdmin ==1)
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger ms-5" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Delete User
    </button>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user? Deleting is permanent and cannot be undone!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <button class="btn btn-danger" type="submit" name="deleteUser">Delete User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection