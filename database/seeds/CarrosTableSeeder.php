<?php

use Illuminate\Database\Seeder;

class CarrosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run() {
            DB::table('carros')->insert([
                'modelo' => 'Sandero',
                'marca_id' => 4,
                'cor' => 'Azul',
                'ano' => '2014',
                'combustivel'=>'F',
                'preco' => '23500.00',
                'destaque'=>'1',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')

            ]);


            DB::table('carros')->insert([
                'modelo' => 'Palio',
                'marca_id' => 1,
                'cor' => 'Vermelho',
                'ano' => '2012',
                'combustivel'=>'A',
                'preco' => '16800.00',
                'destaque'=>'0',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ]);


            DB::table('carros')->insert([
                'modelo' => 'Fiesta',
                'marca_id' => 5,
                'cor' => 'Branco',
                'ano' => '2015',
                'combustivel'=>'F',
                'preco' => '24900.00',
                'destaque'=>'0',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            ]);
        }

    }