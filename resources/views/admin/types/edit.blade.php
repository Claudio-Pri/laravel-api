@extends('layouts.app')

@section('page-title', 'Modifica tipo')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Modifica tipo
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
              <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
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
                    value="{{ $type->title }}"
                    placeholder="Inserisci il titolo...">
                </div>
                <button type="submit" class="btn btn-warning">+ Modifica</button>
              </form> 
            </div>
        </div>
    </div>
@endsection
