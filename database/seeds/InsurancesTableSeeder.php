<?php

use Illuminate\Database\Seeder;
use App\Insurance;

class InsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insurance = new Insurance();
        $insurance->name = 'Healthcare For You';

        $insurance->save();
    }
}
