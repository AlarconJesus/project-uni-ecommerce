<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function detalle($id)
    {
        $producto = Producto::find($id);

        $userId = auth()->user()->id;
        return view('payments.detalle', compact('producto', 'userId'));
    }

    public function store(Request $request)
    {
        $payment = new Payment();

        $payment->nombre = $request->nombre;
        $payment->fecha = $request->fecha;
        $payment->metodo_pago = $request->metodo_pago;
        $payment->monto = $request->monto;
        $payment->moneda = $request->moneda;
        $payment->IVA = $request->IVA;
        $payment->referencia = $request->referencia;
        $payment->comentario = $request->comentario;
        $payment->id_user = $request->id_user;
        $payment->id_producto = $request->id_producto;
        //almacenar imagen?

        $payment->save();

        return redirect()->back()->with('info', 'Pago cargado correctamente!');
    }

    public function miscompras()
    {
        $userId = auth()->user()->id;
        $usuario = User::find($userId);
        $compras1 = $usuario->Payments->Producto();
        dd($compras1);
        $compras = Payment::All();

        $compras = $compras->where('id_user', '=', $userId);

        return view('payments.miscompras', compact('compras'));
    }
}
