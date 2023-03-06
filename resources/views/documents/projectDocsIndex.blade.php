@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Project Documents</li>
        </ol>
    </nav>
</div>
<h1 class="text-center mb-3"><label for="allusers" class="form-label"><strong>All Project Documents</strong></label></h1>

<div class="container mt-2 d-flex justify-content-center">

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Project Name</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created Date</th>

                <th scope="col">Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)


            <tr>

                <th>{{ $document->id }}</th>
                <th scope="row">{{ $document->projectName }}</th>
                <th scope="row">{{ $document->title}}</th>
                <th scope="row">{{ $document->createdBy }}</th>

                <td>{{ date('d-m-Y', strtotime($document->created_at));  }}</td>

                <td><button class="btn-primary" href="{{ route('documents.download') }}">Download</button></td>

            </tr>


            @endforeach


        </tbody>
    </table>



</div>
<div class="pagination justify-content-center">
    {{ $projects->links() }}
</div>
@endsection