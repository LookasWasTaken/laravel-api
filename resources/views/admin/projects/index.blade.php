@extends('layouts.admin')

@section("content")
<div class="container">
    @if(Session::has('added'))
    <div class="alert alert-success alert-dismissible fade show text-center fw-bold my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <span>{{Session::get('added')}}</span>
    </div>
    @elseif(Session::has('deleted'))
    <div class="alert alert-danger alert-dismissible fade show text-center fw-bold my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <span>{{Session::get('deleted')}}</span>
    </div>
    @endif
    <a name="add" id="add" class="text-uppercase btn btn-danger mb-3" href="{{ route('admin.projects.create') }}" role="button">add new project</a>
    <p class="text-uppercase fw-bold text-black">results shown in descending order</p>

    <div class="table-responsive pb-3 rounded-3">
        <table class="table table-secondary m-0">
            <thead>
                <tr class="text-uppercase">
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Type</th>
                    <th class="text-center" scope="col">IMG</th>
                    <th class="text-center" scope="col">Date</th>
                    <th class="text-center" scope="col">URL</th>
                    <th class="text-center" scope="col">Tech</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td class="text-center align-middle" width="5%" scope="row">
                        <span class="text-uppercase">{{$project->id}}</span>
                    </td>
                    <td class="text-center align-middle" width="15%" scope="row">
                        <span class="text-uppercase fw-bold">{{$project->name}}</span>
                    </td>
                    <td class="text-center align-middle" width="5%" scope="row">
                        <span class="text-uppercase badge {{$project->type?->color}}">{{$project->type?->name}}</span>
                    </td>
                    @if($project->image)
                    <td class="text-center align-middle" width="13%" scope="row">
                        <img class="img-fluid" src="{{asset('storage/' . $project->image)}}" alt="{{$project->name}} img">
                    </td>
                    @else
                    <td class="text-center align-middle" width="13%" scope="row">

                    </td>
                    @endif
                    <td class="text-center align-middle" width="7%" scope="row">
                        <span class="text-uppercase fw-bold">{{$project->date}}</span>
                    </td>
                    <td class="text-center align-middle" width="10%">
                        <a class="text-decoration-none" href="{{$project->repo}}">{{$project->repo}}</a>
                    </td>
                    <td class="text-center align-middle" width="6%">
                        @foreach($project->technologies as $technology)
                        <span class="d-inline-block badge {{$technology?->color}}">{{$technology?->name}}</span>
                        @endforeach
                    </td>
                    <td class="text-center align-middle" width="20%">
                        <a class="btn border-primary" href="{{route('admin.projects.show', $project)}}">
                            <i class="fa-solid fa-eye text-primary"></i>
                        </a>
                        <a class="btn border-success my-3" href="{{route('admin.projects.edit', $project)}}">
                            <i class="fa-regular fa-pen-to-square text-success"></i>
                        </a>
                        <button type="button" class="btn border-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$project->id}}">
                            <i class="fa-regular fa-trash-can text-danger"></i>
                        </button>
                        <div class="modal fade" id="modal-{{$project->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$project->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex flex-column">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                        <h5 class="text-muted fs-6 text-uppercase">You are going to delete</h5>
                                        <h5 class="modal-title mb-2 text-uppercase fw-bold" id="modalTitle-{{$project->id}}">{{$project->name}}</h5>
                                        <h5 class="modal-title mb-2 fs-6 text-muted" id="modalTitle-{{$project->id}}">No. {{$project->id}}</h5>
                                        <img width="120" src="{{asset('storage/' . $project->image)}}" alt="">
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-0 text-danger text-uppercase">Once confirmed, there</p>
                                        <p class="mb-0 text-danger text-uppercase">will be no going back</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                                        <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="close">Return</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection