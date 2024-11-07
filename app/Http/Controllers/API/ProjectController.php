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
        // non oso seeddare più di tanto per non fare esplodere tutto 
        $projects = Project::paginate(2);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => [
                'projects' => $projects
            ]
        ]);
    }
}
