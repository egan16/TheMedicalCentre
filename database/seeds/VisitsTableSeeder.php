<?php

use Illuminate\Database\Seeder;
use App\Visit;
//use App\Role;
//use App\Doctor;
//use App\Patient;

class VisitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //$role_doctor = Role::where('name', 'doctor')->first();
      //$role_patient = Role::where('name', 'patient')->first();

        $visit = new Visit();
        $visit->date = new DateTime;
        $visit->time = new DateTime;
        $visit->duration = 60;
        $visit->cost = 50.00;
        //$visit->doctor_id = $doctor->id;
        //$visit->patient_id = $patient->id;
        $visit->save();
    }
}
