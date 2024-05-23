@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-secondary rounded-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-auto">
                <div class="profile_image">
                    <img width="200" class="img-fluid rounded-circle" src="/img/me.jpg" alt="">
                </div>
            </div>
            <div class="col">
                <h1 class="display-5 fw-bold">
                    Amazing me
                </h1>

                <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deleniti, esse adipisci! Aliquam sed molestiae ab natus praesentium minima quaerat minus quidem! Laudantium fugit doloribus, a at officiis minima dicta possimus?</p>
                <a href="{{route('guests.projects.index')}}" class="btn btn-primary btn-lg" type="button">Check out my projects</a>
            </div>
        </div>

    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>


        <div class="row">
            @forelse ($projects as $project)
            <div class="col">
                <div class="card">

                    @if (Str::startsWith($project->cover_image, 'https://'))
                    <img loading="lazy" class="card-img-top" src="{{$project->cover_image}}" alt="">
                    @else
                    <img loading="lazy" class="card-img-top" src="{{asset('storage/' . $project->cover_image)}}" alt="">
                    @endif

                    <div class="card-body">
                        <h3>{{$project->name}}</h3>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{route('guests.projects.show', $project)}}" role="button">
                            View
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col">Nothing to show</div>
            @endforelse
        </div>





    </div>
</div>
@endsection