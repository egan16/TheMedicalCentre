<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Visit;
use App\Doctor;
use App\Patient;

class VisitController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:doctor');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $visits = Visit::all();
      $doctor = Doctor::all();

      return view('doctor.visits.index')->with([
        'visits' => $visits,
        'doctor' => $doctor
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $doctors = Doctor::all();
      $patients = Patient::all();

        return view('doctor.visits.create')->with([
          'doctors' => $doctors,
          'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'date' => 'required',
        'time' => 'required',
        'duration' => 'required',
        'cost' => 'required|numeric|min:0',
        //'doctor_id' => 'required',
        //'patient_id' => 'required',

      ]);

      $visit = new Visit();
      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');

      $visit->save();

      return redirect()->route('doctor.visits.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $visit = Visit::findOrFail($id);

      return view('doctor.visits.show')->with([
        'visit' => $visit
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $visit = Visit::findOrFail($id);
      $doctors = Doctor::all();
      $patients = Patient::all();

      return view('doctor.visits.edit')->with([
        'visit' => $visit,
        'doctors' => $doctors,
        'patients' => $patients
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $visit = Visit::findOrFail($id);

      $request->validate([
        'date' => 'required',
        'time' => 'required',
        'duration' => 'required',
        'cost' => 'required|numeric|min:0',
        'doctor_id' => 'required',
        'patient_id' => 'required',

      ]);

      $visit->date = $request->input('date');
      $visit->time = $request->input('time');
      $visit->duration = $request->input('duration');
      $visit->cost = $request->input('cost');
      $visit->doctor_id = $request->input('doctor_id');
      $visit->patient_id = $request->input('patient_id');

      $visit->save();

      return redirect()->route('doctor.visits.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $visit = Visit::findOrFail($id);

      $visit->delete();

      return redirect()->route('doctor.visits.index');
    }
}
