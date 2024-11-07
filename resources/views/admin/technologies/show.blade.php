@extends('layouts.app')

@section('page-title', 'Dettagli tecnologia')

@section('main-content')
    <div class="row">
        <div class="col">
            <h1 class="text-center text-success mb-3">
                {{ $technology->title }}
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                  <li>
                    Nome: {{ $technology->title }}
                  </li>
                  <li>
                    Progetti collegati:
                    <ul>
                      @foreach ($technology->projects as $project )
                        <li>
                          <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">
                            {{ $project->title }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                </ul>
                <div>
                  <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id ]) }}" class="btn btn-outline-success">Modifica</a>
                </div>
                <div>
                  <a href="{{ route('admin.technologies.index') }}">Torna all'index</a>
                </div>
            </div>
        </div>
    </div>
@endsection
