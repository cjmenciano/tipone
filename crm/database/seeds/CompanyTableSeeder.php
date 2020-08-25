<?php

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
        for($i = 1; $i <= 30; $i++){
            DB::table('companies')->insert([
                'name' => ucwords('company'.$i),
                'email' => 'company'.$i.'@gmail.com',
                'logo' => 'noimage.png',
                'website' => 'http://www.company'.$i.'.com'
            ]);
        }
        
    }
}
