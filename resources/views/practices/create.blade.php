@extends('template')

@section('content')
<div class="container">
    <a href="{{ URL::to('/skills/'.$skill->id) }}" class="btn btn-sm btn-light text-secondary fs-5 mb-3">
        <i class="fas fa-arrow-left me-2"></i>
        <span>{{ $skill->name }}</span>
    </a>
    <form action="/practices" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="skill_id" value="{{ $skill->id }}">
        
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
        <div class="row">
            
            <div class="col-md-9">
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
            <div class="col-md-9">
                <div class="mb-3">
                    <label for="phrase" class="form-label">Phrase</label>
                    <textarea class="form-control" name="phrase" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="hanzi" class="form-label">Hanzi</label>
                    <textarea class="form-control" name="hanzi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pinyin" class="form-label">Pinyin</label>
                    <textarea class="form-control" name="pinyin" rows="3"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>
@stop