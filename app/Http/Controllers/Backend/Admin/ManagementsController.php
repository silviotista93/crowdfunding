<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementsController extends Controller
{
    public function index(){

        $managements = Management::with('users')->get();

        return view('backend.admin.management-admin',compact('managements'));
    }
}
