@extends('layouts.app')

@section('page-title', 'Modifica progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Modifica progetto
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
              <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
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
                    value="{{ $project->title }}"
                    placeholder="Inserisci il titolo...">
                </div>
                <div class="mb-3">
                  <label for="url" class="form-label">Url</label>
                  <input
                    type="text"
                    class="form-control"
                    id="url"
                    name="url"
                    value="{{ $project->url }}"
                    placeholder="Inserisci il link al progetto...">
                </div>
                {{-- immagine --}}
                {{-- <div class="mb-3">
                  <label for="url" class="form-label">Url</label>
                  <input
                    type="text"
                    class="form-control"
                    id="url"
                    name="url"
                    value="{{ $project->url }}"
                    placeholder="Inserisci il link al progetto...">
                </div> --}}
                <div class="mb-3">
                  <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
                  <input 
                    type="text"
                    class="form-control"
                    id="description"
                    name="description"
                    value="{{ $project->description }}"
                    placeholder="Inserisci la descrizione...">
                </div>

                <div class="mb-3">
                  <label for="type_id" class="form-label">Categoria</label>
                  <select name="type_id" id="type_id" class="form-control">
                    <option 
                    @if (old('type_id', $project->type_id) == null)
                      selected
                    @endif
                    >Seleziona una categoria...</option>
                    @foreach ($types as $type)
                      <option
                      @if (old('type_id', $project->type_id) == $type->id)
                        selected
                      @endif

                      value="{{ $type->id }}">{{ $type->title }}</option>
                      
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label">Tecnologie: </label>
                    @foreach($technologies as $technology)
                      <div class="form-check form-check-inline">
                        <input
                          @if($project->technologies->contains($technology->id))
                            checked
                          @endif
                          class="form-check-input"
                          type="checkbox"
                          value="{{ $technology->id }}"
                          name="technologies[]"
                          id="technology-{{ $technology->id }}">
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                          {{ $technology->title }}
                        </label>
                      </div>
                    @endforeach
                </div>
                
                <button type="submit" class="btn btn-warning">+ Modifica</button>
              </form> 
            </div>
        </div>
    </div>
@endsection
