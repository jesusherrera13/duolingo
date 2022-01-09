@extends('template')

@section('styles')
<link href="{{ asset('css/vocabulary.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container">
    <form action="/practice" method="POST">
        
        @csrf
        
        <input type="hidden" name="language_id" value="{{ session()->get('language_id') }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="skill_id" value="{{ $skill->id }}">
        
        <div class="d-flex justify-content-between">
            <a href="{{ URL::to('/skill/'.$skill->id) }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                <span>{{ $skill->name }}</span>
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
        <div class="row">
            <div class="col-md-9">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <h3><span class="text-muted">{{ $skill->name }}</span><span> Practice</span></h3>
        
        <div class="row">
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="hanzi" class="form-label">Hanzi</label>
                    <input type="text" class="form-control hanzi" name="hanzi" value="{{ old('hanzi') }}">
                </div>
                <div class="mb-3">
                    <label for="pinyin" class="form-label">Pinyin</label>
                    <input type="text" class="form-control" name="pinyin" value="{{ old('pinyin') }}">
                </div>
                <div class="mb-3">
                    <label for="meaning" class="form-label">Meaning</label>
                    <textarea class="form-control" name="meaning" rows="6">{{ old('meaning') }}</textarea>
                </div>
            </div>
        </div>
    </form>
</div>
@stop