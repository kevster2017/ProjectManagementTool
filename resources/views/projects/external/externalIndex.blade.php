@extends('layouts.app')

@section('content')
<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">External Projects</li>
        </ol>
    </nav>
</div>
<h1 class="text-center mb-3"><label for="externalProjects" class="form-label"><strong>External Projects</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Project Name</th>
                <th scope="col">Project ID</th>
                <th scope="col">Project Manager/Summary</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">RAG Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th scope="row"><a href="{{ route('projects.show', $project->id) }}">{{ $project->projectName }}</a></th>
                <td>{{ $project->id }}</td>
                <td>{{ $project->pmName }}</td>
                <td>{{ date('d-m-Y', strtotime($project->startDate));  }}</td>

                <td>{{ date('d-m-Y', strtotime($project->endDate)); }}</td>

                @if( $project->rag == "Green")
                <td id="rag" style="background-color:green;">Green</td>
                @elseif( $project->rag == "Amber")
                <td id="rag" style="background-color:orange;">Amber</td>

                @else
                <td id="rag" style="background-color:red;">Red</td>

                @endif
            </tr>
            @endforeach


        </tbody>
    </table>



</div>
<div class="pagination justify-content-center">
    {{ $projects->links() }}
</div>

@endsection