<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create(['nombre' => 'Correa del tiempo', 'descripcion' => 'Correa del tiempo para corolla 2001', 'precio' => 14.32, 'stock' => 40, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Rin', 'descripcion' => 'Rin para corolla 2001', 'precio' => 35.00, 'stock' => 40, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Correa del aire acondicionado toyota corolla 2001', 'descripcion' => 'Correa del aire acondicionado toyota corolla 2001', 'precio' => 15.00, 'stock' => 36, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Correa del tiempo', 'descripcion' => 'Correa del tiempo para corsa 2004', 'precio' => 12.32, 'stock' => 20, 'id_categoria' => 4]);
        Producto::create(['nombre' => 'Correa del alternador', 'descripcion' => 'Correa del alternador para ford', 'precio' => 16.66, 'stock' => 103, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Correa del aire acondicionado para Ford', 'descripcion' => 'Correa del aire acondicionado para Ford 2006', 'precio' => 22, 'stock' => 10, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Correa del tiempo', 'descripcion' => 'Correa del tiempo para Hyundai 2010', 'precio' => 24.32, 'stock' => 5, 'id_categoria' => 3]);
    }
}
