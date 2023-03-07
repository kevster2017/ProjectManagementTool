@extends('layouts.app')

@section('content')
<h1 class="text-center mb-3"><label for="reportMissing" class="form-label"><strong>Add New Project</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">

    <div class="card mb-3" style="width: 75%">
        <img src="/storage/images/AI.jpg" class="card-img-top" alt="...">
        <div class="card d-flex ps-5">

            <form style="width:95%" action="{{ route('projects.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <input type="hidden" name="rag" id="rag" value="{{ ('Green') }}">
                <input type="hidden" name="archived" id="archived" value="0">

                <div class="form-group row mt-3">
                    <label for="projectName" class="col-md-3 col-form-label">Project Name</label>
                    <div class="col">
                        <input type="text" class="form-control @error('projectName') is-invalid @enderror" name="projectName" placeholder="Enter Project Name">
                        @error('projectName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="projectManager" class="col-md-3 col-form-label">Project Manager</label>
                    <div class="col">
                        <input type="text" class="form-control @error('projectManager') is-invalid @enderror" name="pmName" placeholder="Enter Project Manager Name">
                        @error('projectManager')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="projectManagerPayroll" class="col-md-3 col-form-label">Project Manager Payroll Number</label>
                    <div class="col">
                        <input type="number" class="form-control @error('projectManagerPayroll') is-invalid @enderror" name="payroll" placeholder="Enter Project Manager Payroll Number">
                        @error('projectManagerPayroll')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="type" class="col col-form-label">Select Project Type</label>
                    <div class="col-9">
                        <select class="form-select @error('type') is-invalid @enderror" name="type" aria-label="Default select example">

                            <option selected="Pipeline">Pipeline </option>
                            <option value="Internal">Internal</option>
                            <option value="External">External</option>


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

                            <option selected="Initiation">Initiation</option>
                            <option value="Service Design">Service Design</option>
                            <option value="Implementation">Implementation</option>
                            <option value="Pilot/Testing">Pilot/Testing</option>

                        </select> @error('stage')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="sponsor" class="col-md-3 col-form-label">Sponsor</label>
                    <div class="col">
                        <input type="text" class="form-control @error('sponsor') is-invalid @enderror" name="sponsor" placeholder="Enter Sponsor Name"> @error('sponsor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <label for="budget" class="col-md-3 col-form-label">Budget</label>
                    <div class="col">
                        <input type="text" class="form-control @error('budget') is-invalid @enderror" name="budget" placeholder="Enter 0 if budget unknown"> @error('budget')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="description" class="col-md-3 col-form-label">Description</label>
                    <div class="col">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" style="height:100%" placeholder="Enter Project Description. Max 250 Characters" minlength="3" maxlength="250 "></textarea> @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>


                <div class="form-group row mt-3">
                    <!-- Date input -->
                    <label class="col-md-3 col-form-label" for="startDate">Start Date</label>
                    <div class="col">
                        <input class="form-control" id="date" name="startDate" placeholder="YYYY/MM/DD" type="text" /> @error('startDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>

                </div>

                <div class="form-group row mt-3">
                    <!-- Date input -->
                    <label class="col-md-3 col-form-label" for="endDate">End Date</label>
                    <div class="col">
                        <input class="form-control" id="date" name="endDate" placeholder="YYYY/MM/DD" type="text" /> @error('endDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span> @enderror
                    </div>
                </div>



                <div class="text-center my-5 me-5"><button class="btn btn-primary ms-5" type="submit">Add Project</button>
                </div>

            </form>


        </div>
    </div>



</div>
@endsection