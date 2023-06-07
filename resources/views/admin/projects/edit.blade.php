@extends("layouts.app")

@section("content")
<div class="container p-5">
    @include('partials.validation')
    <h2 class="text-center text-dark text-uppercase">you are currently editing the item #{{$project->id}}</h2>
    <h2 class="text-center text-dark text-uppercase">{{$project->name}}</h2>
    <form action="{{route('admin.projects.update', $project->id)}}" method="post" class="text-light bg-dark rounded p-5">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="name" class="form-label text-uppercase">name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required placeholder="only name there" aria-describedby="nameHelper" value="{{old('name', $project->name)}}">
            <small id="nameHelper" class="text-muted text-uppercase">insert the name</small>
            @error('name')
            <div class="alert alert-danger p-3 m-3" role="alert">
                <strong>error: </strong>{{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3 d-flex row">
            <label for="type_id" class="col-3 col-form-label text-uppercase">type:</label>
            <select class="fs-6 text-muted col-3 p-1 form-select form-select-lg" name="type_id" id="type_id">
                <option>Choose the project type</option>
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary text-uppercase mx-3">Save</button>
            <button type="reset" class="btn btn-danger text-uppercase mx-3">Reset</button>
            <a class="btn btn-secondary text-uppercase mx-3" href="{{route('admin.projects.index')}}">back</a>
        </div>
    </form>
</div>
@endsection