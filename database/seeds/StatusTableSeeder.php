<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();
        Status::create(['name' => 'En Progreso','description' => 'En Progreso']);
        Status::create(['name' => 'Terminado/a','description' => 'Terminado/a']);
        Status::create(['name' => 'Por Comenzar','description' => 'Por Comenzar']);
    }
}
