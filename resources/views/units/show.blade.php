@extends('template')

@section('styles')
<link href="{{ asset('css/printable.css') }}" rel="stylesheet">
<style>
    #tbl-skills, #tbl-skills_wrapper {
        visibility: hidden 
    }
</style>
@stop

@section('content')
<div class="container">
    
    <div class="d-flex justify-content-between">
        <a href="{{ URL::to('/units') }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
            <i class="fas fa-arrow-left me-2"></i>
            <span>Back to units</span>
        </a>

        @if(Auth::check())
        <div class="dropdown">
            <button class="btn btn-sm btn-{{ session()->get('language_code') }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('unit/'.$unit->id.'/edit') }}">Edit</a></li>
                <li><a class="dropdown-item" href="{{ URL::to('unit/'.$unit->id.'/skill/create') }}">Add skill</a></li>
            </ul>
        </div>
        @endif
    </div>
    <h3>{{ $unit->name }}</h3>
    
    <div class="row">
        <div class="col-md-9">
            
            @include('spinner')
            
            <table id="tbl-skills" class="table table-hover" style="width:100%">
            @if(sizeof($unit->skills))

                <tbody>
                    @foreach($unit->skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td>{{ $skill->name }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
            @endif
        </div>
    </div>
    
</div>
@stop

@section('scripts')
<script src="{{ asset('js/unit.js') }}"></script>
@stop