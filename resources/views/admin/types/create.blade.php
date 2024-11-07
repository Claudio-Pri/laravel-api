@extends('layouts.app')

@section('page-title', 'Crea nuovo tipo')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Inserisci nuovo tipo
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
              <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                  <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    required
                    placeholder="Inserisci il titolo...">
                </div>
                
                <button type="submit" class="btn btn-success">+ Aggiungi</button>
              </form> 
              <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Annulla</a>
            </div>
        </div>
    </div>
@endsection
