<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeRelation;
use Illuminate\Database\Seeder;

class EmployeeRelationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeRelation::truncate();

        $employees =  [
            [
              'company_id' => '1',
              'department_ids' => '["1"]',
              'employee_ids' => '["1"]',
            ],
        ];

        EmployeeRelation::insert($employees);
    }
}
