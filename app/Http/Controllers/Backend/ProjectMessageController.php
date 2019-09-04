<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\ProjectMessage;
use Illuminate\Http\Request;
use Validator;

class ProjectMessageController extends Controller
{
    public function __construct()
    {

    }

    public function index (Request $request) {
        $id = $request->input('project_id', 0);
        return response()->json(ProjectMessage::with('user')->where('id_projects', $id)->get());
    }

    public function store(Request $request) {
        $data = new ProjectMessage([
            'comments' => $request->comentario,
            'id_projects' => $request->project_id,
            'id_users' => \Auth::user()->id
        ]);
        $data->save();

        if ($data) {
            return response()->json($data);
        }
    }
}
