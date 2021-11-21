@extends('template')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-8">
            <div class="d-flex justify-content-between">

                <h3>Units</h3>
                <div>
                    <a href="{{ URL::to('/units/create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i>
                        Add
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @if(sizeof($units))
    <div class="row">
        <div class="col-md-8">
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