@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/units/'.$skill->unit->id) }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        {{ $skill->unit->name }}
    </a>

    <div class="d-flex justify-content-between">
        <h3>{{ $skill->name }}</h3>
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('skills/'.$skill->id.'/edit') }}">Edit</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('skills/'.$skill->id.'/practices/create') }}">Add practice</a></li>
            </ul>
        </div>
    </div>

    @if(sizeof($skill->practices))
    <div class="row">
        <div class="col-md-9">
            <ul class="list-group">
                @foreach($skill->practices as $practice)
                <!-- <a href="/practices/{{ $practice->id }}" class="list-group-item list-group-item-action">{{ $practice->phrase }}</a> -->
                <a href="/practices/{{ $practice->id }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $practice->phrase }}</h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">{{ $practice->hanzi }}</p>
                    <small class="text-muted">{{ $practice->pinyin }}</small>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
@stop