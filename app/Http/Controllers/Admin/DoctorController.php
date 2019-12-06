<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Doctor;
use App\Patient;
use App\Insurance;
use App\Visit;

class DoctorController extends Controller
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
        $doctors = Doctor::all();

        //$doctors = DB::table('doctors')->paginate(2);

        return view('admin.doctors.index')->with([
          'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctors.create');
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
        'address' => 'required',
        'phone' => 'required|max:13',
        'start_date' => 'required',

      ]);

      $user = new User();

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = $request->input('password');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');

      $user->save();

      $doctor = new Doctor();
      $doctor->start_date = $request->input('start_date');
      $doctor->user_id = $user->id;

      $doctor->save();

      return redirect()->route('admin.doctors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $visits = $doctor->visit()->get();

        return view('admin.doctors.show')->with([
          'doctor' => $doctor,
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
      $doctor = Doctor::findOrFail($id);

      return view('admin.doctors.edit')->with([
        'doctor' => $doctor
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
        $doctor = Doctor::findOrFail($id);

        $request->validate([
          'name' => 'required|max:191',
          'email' => 'required|max:191|unique:users,email,' . $doctor->user->id,
          'password' => 'required',
          'address' => 'required',
          'phone' => 'required|max:13',
          'start_date' => 'required',

        ]);

        $doctor->user->name = $request->input('name');
        $doctor->user->email = $request->input('email');
        $doctor->user->password = $request->input('password');
        $doctor->user->address = $request->input('address');
        $doctor->user->phone = $request->input('phone');

        $doctor->user->save();
        $doctor->start_date = $request->input('start_date');

        $doctor->save();

        return redirect()->route('admin.doctors.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::findOrFail($id);

      $doctor->delete();

      return redirect()->route('admin.doctors.index');
    }
}
