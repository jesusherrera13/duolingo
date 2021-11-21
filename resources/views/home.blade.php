@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-9">
            @if(sizeof($units))
                @foreach($units as $unit)
                <h5>{{ $unit->name }}</h5>
                <ul class="list-group">
                    @foreach($unit->skills as $skill)
                    <a href="/skills/{{ $skill->id }}" class="list-group-item list-group-item-action">{{ $skill->name }}</a>
                    @endforeach
                </ul>
                @endforeach
            @endif
        </div>
    </div>
</div>
@stop