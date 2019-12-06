<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Insurance;
use App\Role;
use App\Patient;
use App\Doctor;
use App\Visit;

class PatientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = Patient::all();

      return view('admin.patients.index')->with([
        'patients' => $patients
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $insurances = Insurance::all();

        return view('admin.patients.create')->with([
          'insurances' => $insurances
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
        'name' => 'required|max:191',
        'email' => 'required|max:191',
        'password' => 'required',
        'address' => 'required|max:191',
        'phone' => 'required|max:13',
        //'is_insured' => 'required',
        'insurance_policy_no' => 'required|max:13',

      ]);

      $user = new User();

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');

      $user->save();

      $patient = new Patient();

      $patient->is_insured = $request->input('is_insured');
      $patient->insurance_policy_no = $request->input('insurance_policy_no');
      $patient->user_id = $user->id;
      $patient->insurance_id = $request->input('insurance_id');

      $patient->save();

      return redirect()->route('admin.patients.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $patient = Patient::findOrFail($id);
      $visits = $patient->visit()->get();

      return view('admin.patients.show')->with([
        'patient' => $patient,
        'visits' => $visits
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
      $patient = Patient::findOrFail($id);
      $insurances = Insurance::all();

      return view('admin.patients.edit')->with([
        'patient' => $patient,
        'insurances' => $insurances
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
        $patient = Patient::findOrFail($id);

        $request->validate([
          'name' => 'required|max:191',
          'email' => 'required|max:191|unique:users,email' . $patient->user->id,
          'password' => 'required',
          'address' => 'required|max:191',
          'phone' => 'required|max:13',
          //'is_insured' => 'required',
          'insurance_policy_no' => 'required|max:13',
          //'insurance_id' => '',

        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        $user->save();

        $patient = new Patient();

        $patient->is_insured = $request->input('is_insured');
        $patient->insurance_policy_no = $request->input('insurance_policy_no');
        $patient->user_id = $user->id;
        $patient->insurance_id = $request->input('insurance_id');

        $patient->save();

        return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $patient = Patient::findOrFail($id);

      $patient->delete();

      return redirect()->route('admin.patients.index');
    }
}
