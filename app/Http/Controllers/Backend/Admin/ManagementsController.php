<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Country;
use App\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementsController extends Controller
{
    public function index(){

        $managements = Management::with('users')->get();
        $countries = Country::all();
        return view('backend.admin.management-admin',compact('managements','countries'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        return $request;
    }
}
