@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/skills/'.$skill->id) }}" class="btn btn-sm btn-light text-secondary mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        {{ $skill->unit->name }}
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

    <form action="/skills/{{ $skill-> id }}" method="POST">

        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="unit_id" value="{{ $skill->unit_id }}">
        <input type="hidden" name="id" value="{{ $skill-> id }}">

        <div class="row">
            
            <div class="col-md-8">
                <div class="d-flex justify-content-between">

                    <h3 class="text-secondary">Editing `{{ $skill->name }}`</h3>
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
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $skill->name) }}">
                </div>
            </div>
        </div>
    </form>
    
</div>
@stop