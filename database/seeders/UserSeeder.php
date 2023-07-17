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
            'name' => 'Pedro Trasmonte',
            'email' => 'proinfalca@gmail.com',
            'password' => bcrypt('Admin12345$'),
            'cedula' => '0',
            'telefono' => '0',
            'pregunta_secreta' => 'Marca carro preferida',
            'respuesta_secreta' => bcrypt('toyota')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jesus',
            'email' => 'alarconmjesusmanuel@gmail.com',
            'password' => bcrypt('12345678'),
            'cedula' => '28871601',
            'telefono' => '04121234567',
            'pregunta_secreta' => 'Marca carro preferida',
            'respuesta_secreta' => bcrypt('toyota')
        ])->assignRole('Admin');

        User::factory(19)->create();
    }
}
