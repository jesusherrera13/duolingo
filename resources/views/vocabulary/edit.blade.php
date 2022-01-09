@extends('template')

@section('styles')
<link href="{{ asset('css/vocabulary.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="container">
    <form action="/vocabulary/{{ $vocabulary->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $vocabulary->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="d-flex justify-content-between">
            <a href="{{ URL::to('vocabulary') }}" class="btn btn-sm btn-chinese mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                <span>Vocabulary</span>
            </a>
            @if(Auth::check())
            <div class="dropdown">
                <button class="btn btn-sm btn-chinese dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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

        <h3>
            <span>{{ $vocabulary->hanzi }}</span>
            <span class="text-muted fs-6">{{ $vocabulary->pinyin }}</span>
        </h3>

        <span class="meaning text-muted">
            {{ $vocabulary->meaning }}
        </span>
        
        <div class="row mt-3">
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="hanzi" class="form-label">Hanzi</label>
                    <input type="text" class="form-control hanzi" name="hanzi" value="{{ old('hanzi', $vocabulary->hanzi) }}">
                </div>
                <div class="mb-3">
                    <label for="pinyin" class="form-label">Pinyin</label>
                    <input type="text" class="form-control" name="pinyin" value="{{ old('pinyin', $vocabulary->pinyin) }}">
                </div>
                <div class="mb-3">
                    <label for="meaning" class="form-label">Meaning</label>
                    <textarea class="form-control" name="meaning" rows="6">{{ old('meaning', $vocabulary->meaning) }}</textarea>
                </div>
            </div>
        </div>
    </form>
</div>
@stop