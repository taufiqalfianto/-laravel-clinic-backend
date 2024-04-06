<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    //index
    public function index(Request $request)
    {
        $patients = DB::table('patients')
        ->when($request->input('nik'), function ($query, $name) {
            return $query->where('nik', $name);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.patient.index', compact('patients'));
    }

    //create
    public function create()
    {
    }

    //store
    public function store(Request $request)
    {
    }

    //show
    public function show($id)
    {
    }

    //edit
    public function edit($id)
    {
    }

    //update
    public function update(Request $request, $id)
    {
    }

    //destroy
    public function destroy($id)
    {
    }
}
