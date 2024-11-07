@extends('layouts.app')

@section('page-title', 'Tecnologie')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Tecnologie
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
                        <th scope="col">Progetti collegati</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($technologies as $technology)
                      <tr>
                        <th scope="row">{{ $technology->id }}</th>
                        <td>{{ $technology->title }}</td>
                        <td>
                          {{ $technology->projects()->count() }}
                        </td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-success my-1">Vedi</a>
                            <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-outline-success my-1">Modifica</a>
                            <form 
                              
                              onsubmit="return confirm('Sei sicuro di voler cancellare questo tipo?')"
                              action="{{ route('admin.technologies.destroy', ['technology' => $technology->id ]) }}" 
                              method="POST" 
                              class="d-inline-block">
                              @csrf
                              @method('DELETE')
                              <button technology="submit" class="btn btn-outline-danger my-1">
                                Emilina
                              </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    <a href="{{ route('admin.technologies.create') }}" class="btn btn-success">+ Aggiungi tecnologia</a>

                  </div>
            </div>
        </div>
    </div>
@endsection