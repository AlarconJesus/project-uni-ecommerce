<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jesus',
            'email' => 'alarconmjesusmanuel@gmail.com',
            'password' => bcrypt('12345678'),
            'telefono' => '04121234567',
            'pregunta_secreta' => 'Marca carro preferida',
            'respuesta_secreta' => bcrypt('toyota')
        ])->assignRole('Admin');

        User::factory(19)->create();
    }
}
