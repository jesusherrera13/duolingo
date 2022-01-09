@extends('template')

@section('styles')
<link href="{{ asset('css/printable.css') }}" rel="stylesheet">
<style>
    #tbl-vocabulary, #tbl-vocabulary_wrapper {
        visibility: hidden 
    }
</style>
@stop

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <div class="print-checks">
            <span class="me-3">
                <input class="form-check-input" type="checkbox" id="hanzi" value="1" checked>
                Hanzi
            </span>
            <span class="me-3">
                <input class="form-check-input" type="checkbox" id="pinyin" value="1" checked>
                Pinyin
            </span>
            <span class="me-3">                
            <input class="form-check-input" type="checkbox" id="meaning" value="1" checked>
                Meaning
            </span>
        </div>

        @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-sm btn-{{ session()->get('language_code') }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <form action="{{ '/printable' }}" method="post">
                        @csrf
                        <input type="hidden" name="module" value="practices">
                        <input type="hidden" name="id" value="">
                        
                        <li><a class="dropdown-item" href="{{ URL::to('vocabulary/create') }}">New</a></li>
                    </form>
                </ul>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12">

            @include('spinner')

            <table id="tbl-vocabulary" class="table table-sm table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Hanzi</th>
                        <th>Pinyin</th>
                        <th>Meaning</th>
                        <th>HSK</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($vocabulary))
                        @foreach($vocabulary as $k => $row)
                            <tr>
                                <td></td>
                                <td>{{ $row->id }}</td>
                                <td>
                                    <span class="hanzi">
                                        {{ $row->hanzi }}
                                    </span>
                                </td>
                                <td>{{ $row->pinyin }}</td>
                                <td>{{ $row->meaning }}</td>
                                <td>{{ $row->hsk_id }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script src="{{ asset('js/vocabulary.js') }}"></script>
@stop