@extends('layouts.app')

@section('content')
<h1 class="text-center mb-3"><label for="reportMissing" class="form-label"><strong>Edit Project</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">

    <div class="card mb-3" style="width: 75%">
        <img src="/storage/images/AI.jpg" class="card-img-top" alt="...">
        <div class="card d-flex ps-5">

            <form style="width:95%" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')



                <input type="hidden" name="archived" id="archived" value="0">

                <div class="form-group row mt-3">
                    <label for="projectName" class="col-md-3 col-form-label">Project Name</label>
                    <div class="col">
                        <input type="text" class="form-control @error('projectName') is-invalid @enderror" name="projectName" value="{{ $project->projectName }}">
                        @error('projectName')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="projectManager" class="col-md-3 col-form-label">Project Manager</label>
                    <div class="col">
                        <input type="text" class="form-control @error('projectManager') is-invalid @enderror" name="pmName" value="{{ $project->pmName }}">
                        @error('projectManager')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="userID" class="col-md-3 col-form-label">Project Manager User ID</label>
                    <div class="col">
                        <input type="number" class="form-control @error('userID') is-invalid @enderror" name="userID" value="{{ $project->userID }}">
                        @error('userID')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="type" class="col col-form-label">Select Project Type</label>
                    <div class="col-9">
                        <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">

                            <option selected="{{ $project->type }}">{{ $project->type }}</option>
                            <option value="pipeline">Pipeline</option>
                            <option value="internal">Internal</option>
                            <option value="extrernal">External</option>


                        </select> @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <label for="stage" class="col col-form-label">Select Project Stage</label>
                    <div class="col-9">
                        <select class="form-select @error('stage') is-invalid @enderror" name="stage" aria-label="Default select example">

                            <option selected="initiation">Initiation</option>
                            <option value="service design">Service Design</option>
                            <option value="implementation">Implementation</option>
                            <option value="pilot/testing">Pilot/Testing</option>

                        </select> @error('stage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="rag" class="col col-form-label">Select RAG Status</label>
                    <div class="col-9">
                        <select class="form-select @error('rag') is-invalid @enderror" name="rag" aria-label="RAG Status">

                            <option selected="{{ $project->rag }}">{{ $project->rag }}</option>
                            <option value="green">Green</option>
                            <option value="amber">Amber</option>
                            <option value="red">Red</option>


                        </select> @error('rag')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="sponsor" class="col-md-3 col-form-label">Sponsor</label>
                    <div class="col">
                        <input type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" value="{{ $project->sponsor }}"> @error('sponsor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <label for="budget" class="col-md-3 col-form-label">Budget</label>
                    <div class="col">
                        <input type="text" class="form-control @error('budget') is-invalid @enderror" name="budget" value="{{ $project->budget }}"> @error('budget')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="description" class="col-md-3 col-form-label">Description</label>
                    <div class="col">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" style="height:100%" minlength="3" maxlength="250 ">{{ $project->description }}</textarea> @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <!-- Date input -->
                    <label class="col-md-3 col-form-label" for="startDate">Start Date</label>
                    <div class="col">
                        <input class="form-control" id="date" name="startDate" value="{{ $project->startDate }}" type="text" /> @error('startDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>

                </div>

                <div class="form-group row mt-3">
                    <!-- Date input -->
                    <label class="col-md-3 col-form-label" for="endDate">End Date</label>
                    <div class="col">
                        <input class="form-control" id="date" name="endDate" value="{{ $project->endDate}}" type="text" /> @error('endDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <!-- Archive project -->
                <div class="form-check mt-5">
                    <input class="form-check-input" type="checkbox" value="1" name="archived" id="archiveProject">
                    <label class="form-check-label" for="archiveProject">
                        Archive Project
                    </label>
                </div>



                <div class="text-center my-5 me-5"><button class="btn btn-primary ms-5" type="submit">Update Project</button>
                </div>

            </form>


        </div>
    </div>



</div>
@endsection