<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function showProyect (Request $request){
        $data = Project::select(array(
            DB::raw('count(id) as a, DATE_FORMAT(created_at, "%Y-%m-%d") as y')
        ))->where('status',Project::REVISION);
        if ($request->get('fechaInicio') && $request->get('fechaFin')) {
            $fi = \Carbon\Carbon::parse($request->get('fechaInicio'))->toDateString();
            $ff = \Carbon\Carbon::parse($request->get('fechaFin'))->toDateString();
            $data = $data->whereDate("created_at",">=",$fi." 00:00:00")->whereDate("created_at", "<=", $ff." 11:59:59");
        }
        $data->get();
        return json_encode($data);
    }
}
