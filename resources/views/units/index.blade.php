@extends('template')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <a href="{{ URL::to('/') }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
            <i class="fas fa-arrow-left me-2"></i>
            <span>Home</span>
        </a>
        <div class="dropdown">
            <button class="btn btn-sm btn-{{ session()->get('language_code') }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('unit/create') }}">Add unit</a></li>
            </ul>
        </div>
    </div>
    
    <h3>Units</h3>
    
    @if(sizeof($units))
    <div class="row">
        <div class="col-md-9">
            
            <ul class="list-group">
                @foreach($units as $unit)
                <a href="/unit/{{ $unit->id }}" class="list-group-item list-group-item-action">{{ $unit->name }}</a>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
</div>
@stop