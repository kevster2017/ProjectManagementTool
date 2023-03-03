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

<h1 class="text-center mb-3"><label for="userName"" class=" form-label"><strong>{{ $user->name }}</strong></label></h1>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><label>user Manager: </label> {{ $user->pmName}}</h5>
        </div>
        <div class="card-body">

            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-4">
                    <label>user ID: </label> {{ $user->id}}
                </div>

                <div class="col-4">
                    <label>user Type: </label> {{ $user->type}}
                </div>

                <div class="col-4">
                    <label>user Stage: </label> {{ $user->stage}}
                </div>


            </div>

            <div class="container mt-5 d-flex justify-content-center">

                <div class="col-8">
                    <label>user Description: </label> {{ $user->description}}
                </div>

                <div class="col-2">
                    <label>user RAG Status: </label>

                </div>
                <div class="col-2 text-center" style="background-color:green;" id="rag">{{ $user->rag}}</div>


            </div>


            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-6">
                    <label>user Sponsor: </label> {{ $user->sponsor}}
                </div>

                <div class="col-6">
                    <label>user Budget: </label> {{ $user->budget}}
                </div>
            </div>
            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-6">
                    <label>Start Date: </label> {{ $user->startDate}}
                </div>

                <div class="col-6">
                    <label>End Date: </label> {{ $user->endDate}}
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