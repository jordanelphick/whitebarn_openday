<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Workarea;
use Illuminate\Http\Request;

class WorkareaController extends Controller
{
    public function index(Request $request) {
        //dd($request['project'] .  ' - ' . $request['workarea']);

        $project = Project::where('number',$request['project'])->first();

        $workarea = Workarea::where([
            'name'=> str_replace('_', ' ', ucwords($request['workarea'])),
            'project_id'=>$project->id
        ])->first();


        return view('workarea.edit')->with(['project'=>$project, 'workarea'=>$workarea]);
    }
}
