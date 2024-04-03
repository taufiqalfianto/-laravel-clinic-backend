<?php

namespace App\Http\Controllers;

use App\Models\doctorschedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class doctorscheduleController extends Controller
{
    //index
    public function index(Request $request)
    {
        $doctorschedule = doctorschedule::with('doctor')
        ->when($request->input('doctor_id'), function ($query, $doctor_id) {
            return $query->where('doctor_id', $doctor_id);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.doctor_schedule.index', compact('doctorschedule'));
    }

     //create
     public function create()
     {
         $doctors = Doctor::all();
         return view('pages.doctor_schedule.create', compact('doctors'));
     }

     //store
     public function store(Request $request)
     {
         $request->validate([
             'doctor_id' => 'required',
            //  'day' => 'required',
            //  'time' => 'required',
         ]);

         if ($request->senin) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Senin';
            $doctorschedule->time = $request->senin;
            $doctorschedule->save();
        }

        //if selasa is not empty
        if ($request->selasa) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Selasa';
            $doctorschedule->time = $request->selasa;
            $doctorschedule->save();
        }

        //if rabu is not empty
        if ($request->rabu) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Rabu';
            $doctorschedule->time = $request->rabu;
            $doctorschedule->save();
        }

        //if kamis is not empty
        if ($request->kamis) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Kamis';
            $doctorschedule->time = $request->kamis;
            $doctorschedule->save();
        }

        //if jumat is not empty
        if ($request->jumat) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Jumat';
            $doctorschedule->time = $request->jumat;
            $doctorschedule->save();
        }

        //if sabtu is not empty
        if ($request->sabtu) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Sabtu';
            $doctorschedule->time = $request->sabtu;
            $doctorschedule->save();
        }

        //if minggu is not empty
        if ($request->minggu) {
            $doctorschedule = new doctorschedule;
            $doctorschedule->doctor_id = $request->doctor_id;
            $doctorschedule->day = 'Minggu';
            $doctorschedule->time = $request->minggu;
            $doctorschedule->save();
        }

         return redirect()->route('doctor_schedule.index')->with('success', 'Data berhasil ditambahkan');
     }

     //edit
     public function edit($id)
     {
         $doctorschedule = doctorschedule::find($id);
         $doctors = Doctor::all();
         return view('pages.doctor_schedule.edit', compact('doctorschedule', 'doctors'));
     }

     //update
     public function update(Request $request, $id)
     {
         $request->validate([
             'time' => 'required',
         ]);

         $doctorschedule = doctorschedule::find($id);
         $doctorschedule->time = $request->time;
         $doctorschedule->save();

         return redirect()->route('doctor_schedule.index')->with('success', 'Doctor schedule been updated!');
     }

     //destroy
     public function destroy($id)
     {
         doctorschedule::find($id)->delete();
         return redirect()->route('doctor_schedule.index')->with('success', 'Doctor schedule has been removed!');
     }
}
