<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProjectsApprovedController extends Controller
{
    public function index() {
        return view('backend.admin.projects-approved');
    }

    public function togglePublish(Request $request) {
        $id = $request->input('id', null);
        if ($id) {
            $project = Project::findOrFail($id);
            if ($project->status == Project::PUBLISHED){
                $project->status = Project::APPROVAL;
            } else {
                $project->status = Project::PUBLISHED;
            }
            $project->save();
        }
        return response()->json([]);
    }
}
