<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payment";

    protected $fillable = ['nombre', 'fecha', 'moneda', 'metodo_pago', 'monto', 'IVA', 'referencia', 'comentario', 'id_user', 'id_producto'];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
