<?php

use Illuminate\Database\Seeder;
// use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $faker = Faker::create("id_ID");
         DB::table("admin")->insert([
        	"nama" 	=> "Admin",
        	"email"	=> "Admin@min.com",
            "password" => "minmin"
        ]);
    }
}
