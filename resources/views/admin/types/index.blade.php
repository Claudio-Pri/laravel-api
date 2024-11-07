@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                Types index
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
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($types as $type)
                      <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td>{{ $type->title }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>
                            <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-success my-1">Vedi</a>
                            <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-outline-success my-1">Modifica</a>
                            <form 
                              
                              onsubmit="return confirm('Sei sicuro di voler cancellare questo tipo?')"
                              action="{{ route('admin.types.destroy', ['type' => $type->id ]) }}" 
                              method="POST" 
                              class="d-inline-block">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger my-1">
                                Emilina
                              </button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div>
                    <a href="{{ route('admin.types.create') }}" class="btn btn-success">+ Crea nuovo tipo</a>

                  </div>
            </div>
        </div>
    </div>
@endsection