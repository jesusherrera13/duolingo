@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/skills/'.$practice->skill->id) }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        {{ $practice->skill->name }}
    </a>

    <div class="d-flex justify-content-between">
        <h3>{{ $practice->name }}</h3>
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('practices/'.$practice->id.'/edit') }}">Edit</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="list-group">
                <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $practice->phrase }}</h5>
                    <small class="text-muted">3 days ago</small>
                    </div>
                    <p class="mb-1">{{ $practice->hanzi }}</p>
                    <small class="text-muted">{{ $practice->pinyin }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@stop