<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//per slug da documentazione laravel
// use Illuminate\Support\Str;

// Helpers
use Illuminate\Support\Facades\Storage;

//Models
use App\Models\{
    Project,
    Type,
    Technology
};




class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validazione dati
        $request->validate([
            'title' => 'required|min:3|max:128',
            'url' => 'nullable|url',
            'cover' => 'nullable|file|max:1024',
            'description' => 'required|min:3|max:4096',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id',

        ]);
        $data = $request->all();
        // $slug = Str::of($data['title'])->slug('-');
        // $data['slug'] = $slug;
        $data['slug'] = str()->slug($data['title']);

        // dd($data);

        // Salvataggio file
        $coverPath = Storage::put('uploads', $data['cover']);
        
        // dd($coverPath);

        $data['cover'] = $coverPath;

        $project = Project::create($data);

        // sincronizzo l'array ['technologies']
        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view('admin.projects.show', compact('project'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|min:3|max:128',
            'url' => 'nullable|url',
            'description' => 'required|min:3|max:4096',
            'type_id'=>'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id',

        ]);
        $data = $request->all();
        // $slug = Str::of($data['title'])->slug('-');
        // $data['slug'] = $slug;
        $data['slug'] = str()->slug($data['title']);

        // dd($data);
        $project->update($data);

        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
