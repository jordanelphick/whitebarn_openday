<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class ProjectController extends Controller
{

    public function index($number) {
        $project = Project::where('number',$number)->first();
        return view('projects.edit')->with(['project'=>$project]);
    }
}




/* THIS IS AN EXAMPLE HOW TO USE HASHIDS TO ENCODE / DECODE A MODEL ID TO OBFUSCATE THE URL ROUTE
use Hashids;
public function index($hashed_id) {
    $id = Hashids::decode($hashed_id);
    $project = Project::find($id[0]);

    return view('projects.edit')->with(['project'=>$project]);
}*/
