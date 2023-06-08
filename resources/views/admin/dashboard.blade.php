@extends('layouts.admin')

@section('content')
<div class="w-50 text-center mx-auto">
    <div class="bg-dark text-light mx-auto rounded-3 py-2 d-flex align-items-center justify-content-center">
        <h2 class="text-uppercase my-1">latest project</h2>
    </div>
    <div class="bg-dark text-light mx-auto rounded-3 py-4 my-3 d-flex flex-column align-items-center justify-content-center gap-3">
        <p class="fw-normal fs-1 my-0">{{$project['0']->name}}</p>
        <div class="d-flex justify-content-center gap-2 align-items-center">
            <span class="fs-6 badge {{$type['0']->color}}">{{$type['0']->name}}</span>
            <span class="fs-6 badge {{$technology['0']->color}}">{{$technology['0']->name}}</span>
        </div>
        <a class="text-decoration-none" href="{{$project['0']->repo}}">{{$project['0']->repo}}</a>
    </div>
</div>
@endsection