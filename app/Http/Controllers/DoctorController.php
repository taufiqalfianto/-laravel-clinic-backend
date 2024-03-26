<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = DB::table('doctors')->when($request->input('name'), function ($query, $doctor_name) {
            return $query->where('doctor_name', 'like', '%' . $doctor_name . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('pages.doctor.index', compact('doctors'));
    }

    //create
    public function create()
    {
        return view('pages.doctor.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialis' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'doctor_sip' => 'required',
            'id_ihs'=> 'required',
            'nik'=> 'required',
        ]);

        $doctor = new Doctor();
        $doctor->doctor_name = $request->doctor_name;
        $doctor->doctor_specialis = $request->doctor_specialis;
        $doctor->doctor_address = $request->doctor_address;
        $doctor->doctor_email = $request->doctor_email;
        $doctor->doctor_phone = $request->doctor_phone;
        $doctor->doctor_sip = $request->doctor_sip;
        $doctor->save();

        if ($request->hasFile('doctor_photo')) {
            $image = $request->file('doctor_photo');
            $image->storeAs('public/doctors', $doctor->id . '.' . $image->getClientOriginalExtension());
            $doctor->doctor_photo = 'storage/doctors/' . $doctor->id . '.' . $image->getClientOriginalExtension();
            $doctor->save();
        }

        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    }

    //show
    public function show($id)
    {
        $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctors.show', compact('doctor'));
    }

    //edit
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        // $doctor = DB::table('doctors')->where('id', $id)->first();
        return view('pages.doctor.edit', compact('doctor'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'doctor_name' => 'required',
            'doctor_specialist' => 'required',
            'doctor_phone' => 'required',
            'doctor_email' => 'required|email',
            'doctor_sip' => 'required',
        ]);

        // $doctor = Doctor::find($id);
        // $doctor->doctor_name = $request->doctor_name;
        // $doctor->doctor_specialis = $request->doctor_specialis;
        // $doctor->doctor_address = $request->doctor_address;
        // $doctor->doctor_email = $request->doctor_email;
        // $doctor->doctor_phone = $request->doctor_phone;
        // $doctor->doctor_sip = $request->doctor_sip;
        // $doctor->save();

        DB::table('doctors')->where('id', $id)->update([
            'doctor_name' => $request->doctor_name,
            'doctor_specialist' => $request->doctor_specialist,
            'doctor_phone' => $request->doctor_phone,
            'doctor_email' => $request->doctor_email,
            'doctor_sip' => $request->doctor_sip,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        DB::table('doctors')->where('id', $id)->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
