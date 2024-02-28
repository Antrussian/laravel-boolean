<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Eager load 'technologies' and 'type' relationships
        $projects = Project::with(['technologies', 'type'])->get();

        return response()->json([
            "success" => true,
            "result" => $projects,
        ]);
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Project $project)
    {
        // Eager load 'technologies' and 'type' relationships for the single project
        $project->load(['technologies', 'type']);

        return response()->json([
            "success" => true,
            "result" => $project,
        ]);
    }
}
