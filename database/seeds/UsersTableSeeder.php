<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_doctor = Role::where('name', 'doctor')->first();
      $role_patient = Role::where('name', 'patient')->first();

      $admin = new User();
      $admin->name = 'Andy Adams';
      $admin->email = 'AA@themedicalcentre.com';
      $admin->password = bcrypt('secret');
      $admin->address = rand(1, 100) . " Main Street";
      $admin->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $doctor = new User();
      $doctor->name = 'Ben Bowie';
      $doctor->email = 'BB@themedicalcentre.com';
      $doctor->password = bcrypt('secret');
      $doctor->address = rand(1, 100) . " Main Street";
      $doctor->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $doctor = new User();
      $doctor->name = 'Tony Hawk';
      $doctor->email = 'TH@themedicalcentre.com';
      $doctor->password = bcrypt('secret');
      $doctor->address = rand(1, 100) . " Main Street";
      $doctor->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $doctor->save();
      $doctor->roles()->attach($role_doctor);

      $patient = new User();
      $patient->name = 'Carl Conners';
      $patient->email = 'CC@themedicalcentre.com';
      $patient->password = bcrypt('secret');
      $patient->address = rand(1, 100) . " Main Street";
      $patient->phone = '0' . $this->random_str(2, '0123456789') . '-' . $this->random_str(7, '0123456789');
      $patient->save();
      $patient->roles()->attach($role_patient);
    }

    private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'){

      $pieces = [];
      $max = mb_strlen($keyspace, '8bit') - 1;
      for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
      }

      return implode('', $pieces);
    }
}
