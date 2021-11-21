@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/units/'.$unit->id) }}" class="btn btn-sm btn-light text-secondary fs-5 mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        <span>{{ $unit->name }}</span>
    </a>
    <form action="/skills" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="unit_id" value="{{ $unit->id }}">
        
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
        <div class="row">
            
            <div class="col-md-8">
                <div class="d-flex justify-content-between">

                    <h3>Add skill</h3>
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
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
            </div>
        </div>
    </form>
</div>
@stop