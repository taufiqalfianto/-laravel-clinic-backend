<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    //index
    public function index(Request $request)
    {
        $patients = DB::table('patients')
            ->when($request->input('nik'), function ($query, $nik) {
                return $query->where('nik', 'like', '%', $nik, '%');
            })
            ->orderBy('id', 'desc')
            ->get();

        return response(
            [
                'data' => $patients,
                'message' => 'success',
                'status' => true
            ], 200
        );
    }
}
