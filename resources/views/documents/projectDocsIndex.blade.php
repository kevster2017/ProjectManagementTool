@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Documents</li>
        </ol>
    </nav>
</div>
<h1 class="text-center mb-3"><label for="allusers" class="form-label"><strong>Project Documents</strong></label></h1>

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
                @if(auth()->check() && auth()->user()->isAdmin ==1)
                <th scope="col">Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)


            <tr>

                <th>{{ $document->id }}</th>
                <th scope="row">{{ $document->projectName }}</th>
                <td scope="row">{{ $document->title}}</td>
                <td scope="row">{{ $document->createdBy }}</td>

                <td>{{ date('d-m-Y', strtotime($document->created_at));  }}</td>

                <td><a class="btn btn-primary" href="{{ route('documents.download', $document->id) }}">Download</a></td>





                <td> @if(auth()->check() && auth()->user()->isAdmin ==1)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                    </button>
                    @endif
                </td>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Document</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this document? Deleting is permanent and cannot be undone!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-danger" type="submit" name="deleteDocument">Delete Document</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


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