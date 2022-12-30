<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $employees =  [
            [
              'irstname' => 'Dheeraj',
              'lastname' => 'Aragariya',             
            ],
            [
              'name' => 'Rupak',
              'lastname' => 'Gupta',    
            ] 
          ];

          Employee::insert($employees);
    }
}
