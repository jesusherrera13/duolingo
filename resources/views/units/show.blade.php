@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/units') }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        <span>Back to units</span>
    </a>

    <div class="d-flex justify-content-between">

        <h3>{{ $unit->name }}</h3>
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('units/'.$unit->id.'/edit') }}">Edit</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('units/'.$unit->id.'/skills/create') }}">Add skill</a></li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9">

            @if(sizeof($unit->skills))
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-group">
                        @foreach($unit->skills as $skill)
                        <a href="/skills/{{ $skill->id }}" class="list-group-item list-group-item-action">{{ $skill->name }}</a>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>

        <div class="col-md-3">
            <!-- <div>
                            <a href="{{ URL::to('/units/'.$unit->id.'/skills/create') }}" class="btn btn-sm btn-success mb-3">
                                <i class="fas fa-plus"></i>
                                Edit
                            </a>
                            <a href="{{ URL::to('/units/'.$unit->id.'/skills/create') }}" class="btn btn-sm btn-primary mb-3">
                                <i class="fas fa-plus"></i>
                                Add new skill
                            </a>
                        </div> -->
            <ul class="list-group">
                <li class="list-group-item">
                    Edit
                </li>
            </ul>
        </div>
    </div>
    
</div>
@stop