@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/') }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        <span>Home</span>
    </a>

    <div class="d-flex justify-content-between">

        <h3>Units</h3>
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('units/create') }}">Add unit</a></li>
            </ul>
        </div>
    </div>
    
    @if(sizeof($units))
    <div class="row">
        <div class="col-md-9">
            <ul class="list-group">
                @foreach($units as $unit)
                <a href="/units/{{ $unit->id }}" class="list-group-item list-group-item-action">{{ $unit->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
@stop