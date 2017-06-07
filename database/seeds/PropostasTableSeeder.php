<?php

use Illuminate\Database\Seeder;

class PropostasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propostas')->insert([
            'nome' => 'William Maich Kolosque',
            'telefone' =>'5399005588',
            'email' => 'williamm@gmail.com',
            'preco' => '23500.00',
            'carros_id'=> 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:d:s')
        ]);
    }
}
