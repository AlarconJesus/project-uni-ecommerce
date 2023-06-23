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
        Categoria::create(['nombre' => 'Automotriz', 'color' => '#1C658C']);
        Categoria::create(['nombre' => 'Multicanal', 'color' => '#398AB9']);
        Categoria::create(['nombre' => 'Industrial', 'color' => '#D8D2CB']);
        Categoria::create(['nombre' => 'De Tiempo', 'color' => '#EEEEEE']);
    }
}
