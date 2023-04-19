<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index() {
        //$projects = Project::where('status','active')->orderBy('number','asc')->get();
        $projects = Project::all();
        return view('projects.index')->with(['projects'=>$projects]);
    }
}
