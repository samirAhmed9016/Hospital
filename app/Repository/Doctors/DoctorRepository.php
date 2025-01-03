<?php

namespace App\Repository\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function index()
    {
        // Fetch all doctors along with their associated sections (if needed)
        $doctors = Doctor::with('section')->get(); // Assuming a 'section' relationship exists on Doctor
        $sections = Section::all(); // If you need to pass the sections to the view

        // Return the view for displaying doctors
        return view('dashboard.Doctors.index', compact('doctors', 'sections'));
    }

    public function store($request)
    {
        // Create a new doctor record
        Doctor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password),
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'section_id' => $request->input('section_id'),  // Store the section_id

            'appointments' => $request->input('appointments'),
            'section_id' => $request->input('section_id'),
        ]);

        session()->flash('add', 'Doctor added successfully.');
        return redirect()->route('doctors.index');
    }

    public function edit($id)
    {
        // Find the doctor by ID for editing
        $doctor = Doctor::findOrFail($id);
        $sections = Section::all(); // If you need to pass the sections to the edit view

        // Return the edit view with doctor details
        return view('dashboard.Doctors.edit', compact('doctor', 'sections'));
    }

    public function update($request)
    {
        // Find the doctor by ID and update their details
        $doctor = Doctor::findOrFail($request->id);
        $doctor->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'price' => $request->input('price'),
            'appointments' => $request->input('appointments'),
            'section_id' => $request->input('section_id'),
        ]);

        session()->flash('edit', 'Doctor updated successfully.');
        return redirect()->route('doctors.index');
    }

    public function destroy($request)
    {
        // Find the doctor by ID and delete the record
        $doctor = Doctor::findOrFail($request->id);
        $doctor->delete();

        session()->flash('delete', 'Doctor deleted successfully.');
        return redirect()->route('doctors.index');
    }
}
