@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <section class="hero">
        <h1 class="text-center mb-3">Project Management Tool<br>

        </h1>
    </section>

</div>

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <a href="{{ route('projects.internalIndex') }}">
                <div class="card" id="homeCard">
                    <img src="/storage/images/internal.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Internal Projects</h5>
                        <p class="card-text">Click here to view the Internal Projects</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('projects.externalIndex') }}">
                <div class="card" id="homeCard">
                    <img src="/storage/images/external.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">External Projects</h5>
                        <p class="card-text">Click here to view the External Projects</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('projects.pipelineIndex') }}">
                <div class="card" id="homeCard">
                    <img src="./storage/images/pipeline.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pipeline Projects</h5>
                        <p class="card-text">Click here to view the Pipeline Projects</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <a href="{{ route('projects.index') }}">
                <div class="card" id="homeCard">
                    <img src="/storage/images/portfolio.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Portfolio</h5>
                        <p class="card-text">Click here to view the Project Portfolio</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


@endsection