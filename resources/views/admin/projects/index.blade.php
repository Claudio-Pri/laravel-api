@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Projects index
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tecnologie</th>
                        <th scope="col">Slug</th>
                        <th scope="col">url</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($projects as $project)
                      <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>
                          @if($project->type != null)
                            <a href="{{ route('admin.types.show', ['type' => $project->type_id]) }}">
                              {{ $project->type->title }}
                            </a>
                          @else
                            -
                          @endif
                        </td>
                        <td>
                          @foreach($project->technologies as $technology)
                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="badge rounded-pill text-bg-secondary">
                              {{ $technology->title }}
                            </a>
                          @endforeach
                        </td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->url }}</td>
                        <td>{{ $project->description }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-success w-100 my-1">Vedi</a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-outline-success w-100 my-1">Modifica</a>
                            <form 
                              {{-- doppia conferma cancellazione --}}
                              onsubmit="return confirm('Sei sicuro di voler cancellare questo progetto?')"
                              action="{{ route('admin.projects.destroy', ['project' => $project->id ]) }}" 
                              method="POST" 
                              class="d-inline-block w-100">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger w-100 my-1">
                                Emilina
                              </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-success">+ Crea nuovo progetto</a>

                  </div>
                  <div>
                    <a href="{{ route('admin.types.index') }}">Vai alle tipologie</a>
                  </div>
            </div>
        </div>
    </div>
@endsection
