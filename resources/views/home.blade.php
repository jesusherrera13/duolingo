@extends('template')

@section('content')
<div class="container">
    <h1>Home</h1>
    <div class="row">
        <div class="col-9">
            @if(sizeof($units))
                @foreach($units as $unit)
                <h5>
                    <a href="/unit/{{ $unit->id }}">{{ $unit->name }}</a>
                </h5>
                <ul class="list-group">
                    @foreach($unit->skills as $skill)
                    <a href="/skill/{{ $skill->id }}" class="list-group-item list-group-item-action">{{ $skill->name }}</a>
                    @endforeach
                </ul>
                @endforeach
            @endif
        </div>
    </div>
</div>
@stop