@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info ms-5" data-bs-toggle="modal" data-bs-target="#documentModal">
                        Upload Document
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="documentModalLabel">Upload Document</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form style="width:95%" action="{{ route('documents.store') }}" enctype="multipart/form-data" method="POST">
                                        @csrf

                                        <input type="hidden" name="userID" id="userID" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="projectID" id="projectID" value="{{ $project->id }}">
                                        <input type="hidden" name="projectName" id="projectName" value="{{ $project->projectName }}">
                                        <input type="hidden" name="createdBy" id="createdBy" value="{{ auth()->user()->name }}">

                                        <div class="form-group row ">
                                            <label for="sponsor" class="col-md-3 col-form-label">Document Title</label>
                                            <div class="col">
                                                <input type="text" class="form-control @error('title') is-invalid @enderror mt-2" name="title" placeholder="Enter Document Title"> @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label for="documentPath" class="col-md-3 col-form-label">Select File</label>
                                            <div class="col">
                                                <input type="file" class="form-control form-control-sm @error('documentPath') is-invalid @enderror mt-2 inputfile" name="documentPath"> @error('documentPath')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span> @enderror
                                            </div>
                                        </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Upload File</button>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="container mt-5 d-flex justify-content-center">
    <a href=" {{ route('projects.edit', $project->id) }}" class=" btn btn-primary me-3 ">Edit Project</a>
    <a href=" {{ route('documents.index') }}" class=" btn btn-info me-3 ">Project Documents</a>
    <a href=" {{ route('projects.destroy', $project->id) }}" class=" btn btn-danger ">Delete Project</a>
</div>


@endsection