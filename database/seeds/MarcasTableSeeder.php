<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert(['nome' => 'Fiat', 'pais' => 'italia']);
        DB::table('marcas')->insert(['nome' => 'Chefrolet', 'pais' => 'eua']);
        DB::table('marcas')->insert(['nome' => 'Volkswagen', 'pais' => 'alemanha']);
        DB::table('marcas')->insert(['nome' => 'Renault', 'pais' => 'franca']);
        DB::table('marcas')->insert(['nome' => 'Ford', 'pais' => 'eua']);
    }
}