@extends('layouts.admin')


@section('content')


<header class="py-3 bg-secondary">
    <div class="container">
        <h1>New Project</h1>
    </div>
</header>

<div class="container mt-5">

    @include('partials.errors')

    <form action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="namehelper" placeholder="My cool laravel project name" value="{{old('name')}}" />
            <small id="namehelper" class="form-text text-muted">Type a name for your project</small>
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text">Upload a cover image</div>
            @error('cover_image')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="project_url" class="form-label">Preject URL</label>
            <input type="text" class="form-control" name="project_url" id="project_url" aria-describedby="urlHelper" placeholder="https://link_here" value="{{old('project_url')}}" />
            <small id="urlHelper" class="form-text text-muted">Type a url for your project</small>
            @error('project_url')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="source_code_url" class="form-label">Source Code URL</label>
            <input type="text" class="form-control" name="source_code_url" id="source_code_url" aria-describedby="sourceHelper" placeholder="https://link_here" value="{{old('source_code_url')}}" />
            <small id="sourceHelper" class="form-text text-muted">Type a source code url for your project</small>
            @error('source_code_url')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
            @error('description')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">
            <i class="fas fa-arrow-left    "></i> Create
        </button>


    </form>
</div>

@endsection