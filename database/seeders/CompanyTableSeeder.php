<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company::truncate();

        $company =  [
            [
              'name' => 'Sofutions Pvt Ltd',
              'email' => 'test1@email.com',             
            ],
            [
              'name' => 'Signi Pvt Ltd',
              'email' => 'test2@email.com',    
            ],           
        ];

        Company::insert($company);
    }
}
