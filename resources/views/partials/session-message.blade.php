@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>Success!</strong>
    {{session('message')}}
</div>

@endif