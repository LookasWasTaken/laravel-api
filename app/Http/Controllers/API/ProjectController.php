<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::with(["technologies", "type"])->orderByDesc("id")->paginate(6);
        return response()->json([
            'success' => true,
            'projects' => $projects,
        ]);
    }
    public function show($slug){

        $project = Project::with(["technologies", "type"])->where('slug', $slug)->first();
        if($project){
            return response()->json([
                'success' => true,
                'projects' => $project,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }

    }
}
