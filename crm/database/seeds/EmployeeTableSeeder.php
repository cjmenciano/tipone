<?php

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
        for($i = 1; $i <= 30; $i++){
            $company_id = rand(1, 30);
            if($i < 10){
                DB::table('employees')->insert([
                    'firstname' => ucwords('fn_employee'.$i),
                    'lastname' => ucwords('ln_employee'.$i),
                    'company_id' => $company_id,
                    'email' => 'employee'.$i.'@gmail.com',
                    'phone' => '099796010'.$i
                ]);
            }else{
                DB::table('employees')->insert([
                    'firstname' => ucwords('fn_employee'.$i),
                    'lastname' => ucwords('ln_employee'.$i),
                    'company_id' => $company_id,
                    'email' => 'employee'.$i.'@gmail.com',
                    'phone' => '09979601'.$i
                ]);
            }
        }
    }
}
