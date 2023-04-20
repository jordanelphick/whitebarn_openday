<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Project $project) {
        return view('projects.edit')->with(['project'=>$project]);
    }
}
