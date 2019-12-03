<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Patient;
use App\Insurance;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_patient = Role::where('name', 'patient')->first();
      $insurance = Insurance::where('name', 'Healthcare For You')->first();

      foreach ($role_patient->users as $user) {
        $patient = new Patient();

        $patient->is_insured = true;
        $patient->insurance_policy_no = '0987612345';
        $patient->user_id = $user->id;
        $patient->insurance_id = $insurance->id; // how to seed two foreign keys?

        $patient->save();
      }
    }
}
