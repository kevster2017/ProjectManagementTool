@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $project->projectName }}</li>
        </ol>
    </nav>
</div>

<h1 class="text-center mb-3"><label for="reportMissing" class="form-label"><strong>{{ $project->projectName }}</strong></label></h1>


<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><label>Project Manager: </label> {{ $project->pmName}}</h5>
        </div>
        <div class="card-body">

            <div class="container mt-3 d-flex justify-content-center">
                <div class="col-4">
                    <label>Project ID: </label> {{ $project->id}}
                </div>

                <div class="col-4">
                    <label>Project Type: </label> {{ $project->type}}
                </div>

                <div class="col-4">
                    <label>Project Stage: </label> {{ $project->stage}}
                </div>


            </div>

            <div class="container mt-5 d-flex justify-content-center">

                <div class="col-8">
                    <label>Project Description: </label> {{ $project->description}}
                </div>

                <div class="col-2">
                    <label>Project RAG Status: </label>

                </div>

                @if( $project->rag == "Green")
                <div class="col-2 text-center" style="background-color:green;" id="rag">{{ $project->rag}}</div>
                @elseif( $project->rag == "Amber")
                <div class="col-2 text-center" style="background-color:orange;" id="rag">{{ $project->rag}}</div>

                @else

                <div class="col-2 text-center" style="background-color:red;" id="rag">{{ $project->rag}}</div>

                @endif



            </div>


            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-6">
                    <label>Project Sponsor: </label> {{ $project->sponsor}}
                </div>

                <div class="col-6">
                    <label>Project Budget: </label> {{ $project->budget}}
                </div>
            </div>
            <div class="container mt-5 d-flex justify-content-center">
                <div class="col-6">
                    <label>Start Date: </label> {{ $project->startDate}}
                </div>

                <div class="col-6">
                    <label>End Date: </label> {{ $project->endDate}}
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5 d-flex justify-content-center">
    <a href=" {{ route('projects.edit', $project->id) }}" class=" btn btn-primary me-3 ">Edit Project</a>
    <a href=" {{ route('projects.destroy', $project->id) }}" class=" btn btn-danger ">Delete Project</a>
</div>


@endsection