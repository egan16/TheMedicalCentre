<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Patient;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }

  public function index()
  {
    

    return view('patient.home');
  }
}
