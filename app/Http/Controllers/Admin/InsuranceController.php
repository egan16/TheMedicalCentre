<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Insurance;

class InsuranceController extends Controller
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
        $insurances = Insurance::all();

        return view('admin.insurances.index')->with([
          'insurances' => $insurances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insurances.create');
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

      ]);

      $insurance = new Insurance();
      $insurance->name = $request->input('name');

      $insurance->save();

      return redirect()->route('admin.insurances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $insurance = Insurance::findOrFail($id);

      return view('admin.insurances.show')->with([
        'insurance' => $insurance
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
      $insurance = Insurance::findOrFail($id);

      return view('admin.insurances.edit')->with([
        'insurance' => $insurance
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

      $insurance = Insurance::findOrFail($id);

      $request->validate([
        'name' => 'required|max:191',

      ]);

      $insurance->name = $request->input('name');

      $insurance->save();

      return redirect()->route('admin.insurances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $insurance = Insurance::findOrFail($id);

      $insurance->delete();

      return redirect()->route('admin.insurances.index');
    }
}
