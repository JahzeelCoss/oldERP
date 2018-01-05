<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('projects')->delete();
        //['name','description', 'planed_starting_date', 'planed_ending_date']; 2015-09-18  2015-09-30       
        for ($i=0; $i < 10; $i++) { 
        	DB::table('projects')->insert([
            'name' => str_random(10),
            'description' => str_random(10),
            'planed_starting_date' => 2015-09-18,
            'planed_ending_date' => 2015-09-30,
            ]);
        }
    }
}
