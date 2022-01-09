@extends('template')

@section('styles')
<link href="{{ asset('css/vocabulary.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container">
    <form action="/practice/{{ $practice-> id }}" method="POST">

        @csrf
        @method('PUT')

        <input type="hidden" name="language_id" value="{{ session()->get('language_id') }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="skill_id" value="{{ $practice->skill_id }}">
        <input type="hidden" name="id" value="{{ $practice-> id }}">
        
        <div class="d-flex justify-content-between">
            <a href="{{ URL::to('/skills/'.$practice->id) }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                {{ $practice->skill->name }}
            </a>
            @if(Auth::check())
            <div class="dropdown">
                    <button class="btn btn-sm btn-{{ session()->get('language_code') }} dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <button class="dropdown-item" type="submit">
                            Save
                        </button>
                    </ul>
                </div>
            @endif
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    

        <!-- <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Phrase</label>
                    <textarea class="form-control" name="phrase" rows="3">{{ old('name', $practice->phrase) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Hanzi</label>
                    <textarea class="form-control" name="hanzi" rows="3">{{ old('hanzi', $practice->hanzi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Pinyin</label>
                    <textarea class="form-control" name="pinyin" rows="3">{{ old('pinyin', $practice->pinyin) }}</textarea>
                </div>
            </div>
        </div> -->

        <h3>
            <span>{{ $practice->hanzi }}</span>
            <span class="text-muted fs-6">{{ $practice->pinyin }}</span>
        </h3>

        <span class="meaning text-muted">
            {{ $practice->meaning }}
        </span>
        
        <div class="row mt-3">
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="hanzi" class="form-label">Hanzi</label>
                    <input type="text" class="form-control hanzi" name="hanzi" value="{{ old('hanzi', $practice->hanzi) }}">
                </div>
                <div class="mb-3">
                    <label for="pinyin" class="form-label">Pinyin</label>
                    <input type="text" class="form-control" name="pinyin" value="{{ old('pinyin', $practice->pinyin) }}">
                </div>
                <div class="mb-3">
                    <label for="meaning" class="form-label">Meaning</label>
                    <textarea class="form-control" name="meaning" rows="6">{{ old('meaning', $practice->meaning) }}</textarea>
                </div>
            </div>
        </div>
    </form>
    
</div>
@stop