<?php

use Illuminate\Database\Seeder;
use App\User;

class CarroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::created([
            'placa'=>'AAA-1234',
            'modelo'=>'corsa',
            'cor'=>'azul'
        ]);
    }
}
