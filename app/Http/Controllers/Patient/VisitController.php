<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Visit;
use App\Patient;
use App\User;
use App\Auth;

class VisitController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $patient = Patient::findOrFail($id);
      // $visits = $patient->visit()->get();
      //
      //
      // return view('patient.visits.index')->with([
      //   'patient' => $patient,
      //   'visits' => $visits
      // ]);

      // $user = $user->Auth::user()->id;

      $patients = Patient::all();
      $visits = Visit::all();

      return view('patient.visits.index')->with([
        'patients' => $patients,
        'visits' => $visits
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

      return view('patient.visits.show')->with([
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
        //
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
        //
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

      return redirect()->route('patient.visits.index');
    }
}
