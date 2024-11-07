@extends('layouts.app')

@section('page-title', 'Dettagli tipo')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                {{ $type->title }}
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                  <li>
                    Titolo: {{ $type->title }}
                  </li>
                  <li>
                    Slug: {{ $type->slug }}
                  </li>
                </ul>
                <div>
                  <a href="{{ route('admin.types.edit', ['type' => $type->id ]) }}" class="btn btn-outline-success">Modifica</a>
                </div>
                <div>
                  <a href="{{ route('admin.types.index') }}">Torna all'index</a>
                </div>
            </div>
        </div>
    </div>
@endsection
