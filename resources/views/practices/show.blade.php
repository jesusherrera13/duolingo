@extends('template')

@section('styles')
<link href="{{ asset('css/printable.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <a href="{{ URL::to('/skills/'.$practice->skill->id) }}" class="btn btn-sm btn-danger text-warning mb-3">
            <i class="fas fa-arrow-left me-2"></i>
            {{ $practice->skill->name }}
        </a>
        @if(Auth::check())
        <div class="dropdown">
            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Actions
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ URL::to('practices/'.$practice->id.'/edit') }}">Edit</a></li>
                <form action="{{ '/printable' }}" method="post">
                    @csrf
                    <input type="hidden" name="module" value="practices">
                    <input type="hidden" name="id" value="{{ $practice->id }}">
                    @csrf
                    <li class="dropdown-item fw-bold">
                        Print
                    </li>
                    <li class="dropdown-item">
                        <input class="form-check-input me-1" type="checkbox" name="phrase" value="1" checked>
                        Phrase
                    </li>
                    <li class="dropdown-item">
                        <input class="form-check-input me-1" type="checkbox" name="hanzi" value="1" checked>
                        Hanzi
                    </li>
                    <li class="dropdown-item">
                        <input class="form-check-input me-1" type="checkbox" name="pinyin" value="1" checked>
                        Pinyin
                    </li>
                    <li class="dropdown-item">
                        <button class="btn btn-sm btn-primary mt-3" type="submit">
                            <i class="fas fa-print"></i>
                            Print
                        </button>
                    </li>
                </form>
            </ul>
        </div>
        @endif
    </div>

    <div class="mb-3">
        <div class="fs-3">{{ $practice->hanzi }}</div>
        <div class="text-muted">{{ $practice->phrase }}</div>
        <div class="text-muted">{{ $practice->pinyin }}</div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="list-group">
                <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                    <div>{{ $practice->phrase }}</div>
                    <small class="text-muted">3 days ago</small>
                    </div>
                    <div class="fs-5">{{ $practice->hanzi }}</div>
                    <div class="text-muted">{{ $practice->pinyin }}</div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <form action="{{ '/practices/'.$practice->id.'/print' }}" method="post">
                @csrf
                <ul class="list-group">
                    <li class="list-group-item fw-bold">
                        Print
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="phrase" value="1" checked>
                        Phrase
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="hanzi" value="1" checked>
                        Hanzi
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="pinyin" value="1" checked>
                        Pinyin
                    </li>
                </ul>
                <button class="btn btn-sm btn-primary mt-3" type="submit">
                    <i class="fas fa-print"></i>
                    Print
                </button>
            </form>
        </div> -->
    </div>
</div>
@stop