<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Producto;
use App\Models\User;
use App\Models\Dolar;
use Illuminate\Http\Request;
use PDO;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ventas')->only('ventas');
        $this->middleware('can:ventas')->only('detalleventa');
        $this->middleware('can:ventas')->only('update');
    }
    public function detalle($id)
    {
        $producto = Producto::find($id);
        $dolarActual = Dolar::latest('fecha')->first();

        $userId = auth()->user()->id;

        return view('payments.detalle', compact('producto', 'userId', 'dolarActual'));
    }

    public function store(Request $request)
    {
        $payment = new Payment();

        $payment->nombre = $request->nombre;
        $payment->fecha = $request->fecha;
        $payment->metodo_pago = $request->metodo_pago;
        $payment->moneda = $request->moneda;
        $payment->monto = $request->monto;
        $payment->tasa = $request->tasa;
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
        $compras = Payment::All();

        $compras = $compras->where('id_user', '=', $userId);
        foreach ($compras as $compra) {
            $producto = Producto::find($compra->id_producto);

            $compra->producto = $producto;
        }

        return view('payments.miscompras', compact('compras'));
    }

    public function ventas()
    {
        $ventas = Payment::All();
        // TODO: Hacer que las ventas vengan ordenadas por sin verificar y por fecha mas reciente
        foreach ($ventas as $venta) {
            $producto = Producto::find($venta->id_producto);
            $comprador = User::find($venta->id_user);

            if ($producto) {
                $venta->producto = $producto;
            }

            if ($comprador) {
                $venta->comprador = $comprador->name;
                $venta->compradorEmail = $comprador->email;
            }
        }

        return view('payments.ventas', compact('ventas'));
    }

    public function contactanos($id)
    {
        return view('payments.contactanos', compact('id'));
    }

    public function detalleventa($id)
    {
        $venta = Payment::find($id);

        $producto = Producto::find($venta->id_producto);
        $comprador = User::find($venta->id_user);

        $venta->producto = $producto;
        $venta->comprador = $comprador->name;
        $venta->compradorEmail = $comprador->email;

        return view('payments.detalleventa', compact('venta'));
    }

    public function update(Request $request, Payment $payment)
    {
        $payment->verificado = $request->input('verificado');

        $payment->save();

        return redirect()->route('ventas');
    }
}
