@extends('template')

@section('styles')
<link href="{{ asset('css/printable.css') }}" rel="stylesheet">
<style>
    #tbl-practices, #tbl-practices_wrapper {
        visibility: hidden 
    }
</style>
@stop

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            
            <a href="{{ URL::to('/unit/'.$skill->unit->id) }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                {{ $skill->unit->name }}
            </a>
            <h3>{{ $skill->name }}</h3>

            @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-sm btn-{{ session()->get('language_code') }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ URL::to('skill/'.$skill->id.'/edit') }}">Edit</a></li>
                    <li><a class="dropdown-item" href="{{ URL::to('skill/'.$skill->id.'/practices/create') }}">Add practice</a></li>
                </ul>
            </div>
            @endif
        </div>
        
        <div class="print-checks mb-3">
            <span class="me-3">
                <input class="form-check-input" type="checkbox" id="hanzi" value="1" checked>
                Hanzi
            </span>
            <span class="me-3">
                <input class="form-check-input" type="checkbox" id="pinyin" value="1" checked>
                Pinyin
            </span>
            <span class="">                
            <input class="form-check-input" type="checkbox" id="meaning" value="1" checked>
                Meaning
            </span>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div id="d-loader" class="d-flex align-items-center">
                    <button class="btn btn-chinese" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
                <table id="tbl-practices" class="table table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Hanzi</th>
                            <th>Pinyin</th>
                            <th>Meaning</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(sizeof($skill->practices))
                            @foreach($skill->practices as $practice)
                                <tr>
                                    <td></td>
                                    <td>{{ $practice->id }}</td>
                                    <td>
                                        <span class="hanzi">
                                            {{ $practice->hanzi }}
                                        </span>
                                    </td>
                                    <td>{{ $practice->pinyin }}</td>
                                    <td>{{ $practice->meaning }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>

    @include('skills.modal')

@stop


@section('scripts')
<script src="{{ asset('js/skill.js') }}"></script>
@stop