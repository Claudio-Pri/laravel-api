@extends('layouts.app')

@section('page-title', 'Modifica tecnologia')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Modifica tecnologia
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
              <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    required
                    value="{{ $technology->title }}"
                    placeholder="Inserisci il titolo...">
                </div>
                <button type="submit" class="btn btn-warning">+ Modifica</button>
              </form> 
            </div>
        </div>
    </div>
@endsection
