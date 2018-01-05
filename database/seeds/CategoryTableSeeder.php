<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Category::create(['name' => 'Programador','description' => 'Programa']);
        Category::create(['name' => 'Diseñador','description' => 'Diseña']);
        Category::create(['name' => 'Administrador','description' => 'Administra']);
    }
}

