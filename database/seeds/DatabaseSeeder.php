<?php

use Illuminate\Database\Seeder;
use App\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EmployeesTableSeeder::class);
         $this->call(CompaniesTableSeeder::class);
    }
}
