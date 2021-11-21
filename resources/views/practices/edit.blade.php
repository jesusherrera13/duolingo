@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/skills/'.$practice->id) }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        {{ $practice->skill->name }}
    </a>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/practices/{{ $practice-> id }}" method="POST">

        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="skill_id" value="{{ $practice->skill_id }}">
        <input type="hidden" name="id" value="{{ $practice-> id }}">

        <div class="row">
            
            <div class="col-md-8">
                <div class="d-flex justify-content-between">

                    <h3 class="text-secondary">{{ $practice->phrase }}</h3>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-save"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
        </div>
    </form>
    
</div>
@stop