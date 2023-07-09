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
        Producto::create(['nombre' => 'Número 15450 descripción 15450 correa en V automotriz', 'descripcion' => 'Número 15450 descripción 15450 correa en V automotriz', 'precio' => 10.00, 'stock' => 5, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Número 13450 descripción 13450 correa en V automotriz', 'descripcion' => 'Número 13450 descripción 13450 correa en V automotriz', 'precio' => 10.00, 'stock' => 5, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Número 17680 descripción 17680 correa en V automotriz', 'descripcion' => 'Número 17680 descripción 17680 correa en V automotriz', 'precio' => 15.00, 'stock' => 5, 'id_categoria' => 1]);
        Producto::create(['nombre' => 'Número 3pk495 descripción 3pk495 correa multicanal', 'descripcion' => 'Número 3pk495 descripción 3pk495 correa multicanal', 'precio' => 6.17, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 4pk865 descripción 4pk865 correa multicanal', 'descripcion' => 'Número 4pk865 descripción 4pk865 correa multicanal', 'precio' => 11, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 5pk865 descripción 5pk865 correa multicanal', 'descripcion' => 'Número 5pk865 descripción 5pk865 correa multicanal', 'precio' => 13.5, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 5pk1750 descripción 5pk1750 correa multicanal', 'descripcion' => 'Número 5pk1750 descripción 5pk1750 correa multicanal', 'precio' => 27.1, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 6pk1500 descripción 6pk1500 correa multicanal', 'descripcion' => 'Número 6pk1500 descripción 6pk1500 correa multicanal', 'precio' => 17.2, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 6pk1790 descripción 6pk1790 correa multicanal', 'descripcion' => 'Número 6pk1790 descripción 6pk1790 correa multicanal', 'precio' => 24.6, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 7pk2120 descripción 7pk2120 correa multicanal', 'descripcion' => 'Número 7pk2120 descripción 7pk2120 correa multicanal', 'precio' => 33.2, 'stock' => 5, 'id_categoria' => 2]);
        Producto::create(['nombre' => 'Número 8pk1830 descripción 8pk1830 correa multicanal', 'descripcion' => 'Número 8pk1830 descripción 8pk1830 correa multicanal', 'precio' => 20.5, 'stock' => 5, 'id_categoria' => 2]);
    }
}
