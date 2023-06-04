<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre' => 'Toyota', 'color' => '#0079FF']);
        Categoria::create(['nombre' => 'Ford', 'color' => '#00DFA2']);
        Categoria::create(['nombre' => 'Hyundai', 'color' => '#F6FA70']);
        Categoria::create(['nombre' => 'chevrolet', 'color' => '#FF0060']);
    }
}
