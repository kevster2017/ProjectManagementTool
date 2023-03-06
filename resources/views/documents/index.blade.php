@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Documents</li>
        </ol>
    </nav>
</div>
<h1 class="text-center mb-3"><label for="allusers" class="form-label"><strong>All Documents</strong></label></h1>

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
                <th scope="col">Delete</th>
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


                <td><a class="btn btn-primary" href="{{ route('documents.download', $document->id) }}">Download</a></td>

                <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <td><button class="btn btn-danger" type="submit" name="deleteDocument">Delete</button></td>
                </form>
            </tr>


            @endforeach


        </tbody>
    </table>



</div>
<div class="pagination justify-content-center">
    {{ $documents->links() }}
</div>

@if($documents->count() == 0)
<div class="container mt-5 text-center">
    <h1>No documents uploaded</h1>

</div>

@endif
@endsection