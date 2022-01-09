@extends('template')

@section('content')
<div class="container">
    <form action="/skill" method="POST">

        @csrf
        <input type="hidden" name="language_id" value="{{ session()->get('language_id') }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="unit_id" value="{{ $unit->id }}">
        
        <div class="d-flex justify-content-between">
            <a href="{{ URL::to('/units/'.$unit->id) }}" class="btn btn-sm btn-{{ session()->get('language_code') }} mb-3">
                <i class="fas fa-arrow-left me-2"></i>
                <span>{{ $unit->name }}</span>
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
            <div class="col-md-8">
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

        <h3><span class="text-muted">{{ $unit->name }}</span><span> Skill</span></h3>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Write the skill name">
                </div>
            </div>
        </div>
    </form>
</div>
@stop