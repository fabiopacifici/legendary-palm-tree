@extends('layouts.admin')


@section('content')

<header class="py-3 bg-secondary">
    <div class="container">
        <h1>Projects</h1>
    </div>
</header>

<div class="container mt-5">
    <div class="table-responsive-md">
        <table class="table table-striped table-hover table-borderless table-secondary align-middle">
            <thead class="table-dark">
                <caption>
                    Projects
                </caption>
                <tr>
                    <th>ID</th>
                    <th>Cover Image</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Source</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">

                @forelse ($projects as $project )
                <tr class="table-dark">
                    <td scope="row">{{$project->id}}</td>
                    <td>
                        @if (Str::startsWith($project->cover_image, 'https://'))
                        <img loading="lazy" width="120" src="{{$project->cover_image}}" alt="">
                        @else
                        <img loading="lazy" width="120" src="{{asset('storage/' . $project->cover_image)}}" alt="">
                        @endif
                    </td>
                    <td>{{$project->name}}</td>
                    <td><a href="{{$project->project_url}}" target="_blank">Preview</a></td>
                    <td><a href="{{$project->source_code_url}}" target="_blank">Source code</a></td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">
                            <i class="fas fa-eye fa-sm fa-fw"></i>
                        </a>
                        /EDIT/DELETE
                    </td>
                </tr>

                @empty

                <tr class="table-dark">
                    <td scope="row" colspan="6">No project, start workin on something!</td>

                </tr>
                @endforelse

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

</div>
@endsection