@extends('layouts.app')

@section('page-title', 'Dettagli progetto')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                {{ $project->title }}
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                  <li>
                    Titolo: {{ $project->title }}
                  </li>
                  <li>
                    Slug: {{ $project->slug }}
                  </li>
                  <li>
                    Link: {{ $project->url }}
                  </li>
                  <li>
                    Descrizione: {{ $project->description }}
                  </li>
                  <li>
                    Categorie:
                    <ul>
                      <li>
                        @if (isset($project->type))
                        <a href="{{ route('admin.types.show', ['type' => $project->type_id]) }}">
                          {{ $project->type->title }}
                        </a>
                        @else
                          Nessuna categoria assegnata
                        @endif
                      </li>
                    </ul>
                  </li>
                  <li>
                    Tecnologie: 
                    <ul>
                      @foreach($project->technologies as $technology)
                        <li>
                          <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-secondary">
                            {{ $technology->title }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <div>
                  <a href="{{ route('admin.projects.edit', ['project' => $project->id ]) }}" class="btn btn-outline-success">Modifica</a>
                </div>
                <div>
                  <a href="{{ route('admin.projects.index') }}">Torna all'index</a>
                </div>
            </div>
        </div>
    </div>
@endsection
