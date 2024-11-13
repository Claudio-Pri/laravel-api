<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        // $projects = Project::get();
        // Non oso seeddare più di tanto per non fare esplodere tutto 
        $projects = Project::with('technologies', 'type') // Eager loading
                                ->paginate(2);            // Paginazione
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'projects' => $projects
        ]);
    }

    public function show(string $slug) {
        $project = Project::with('technologies', 'type')
                            ->where('slug', $slug)
                            ->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'project' => $project
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'NOT FOUND',
                
            ]);
        }

        
    }
}
