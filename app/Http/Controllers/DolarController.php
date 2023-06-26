<?php

namespace App\Http\Controllers;

use App\Models\Dolar;
use Illuminate\Http\Request;

class DolarController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:dolar.index')->only('index');
        $this->middleware('can:dolar.create')->only('create', 'store');
        $this->middleware('can:dolar.edit')->only('edit', 'update');
        $this->middleware('can:dolar.destroy')->only('destroy');
    }

    public function index()
    {
        $dolarHistorico = Dolar::all();
        return view('dolar.index', compact('dolarHistorico'));
    }

    public function create()
    {
        return view('dolar.create');
    }

    public function store(Request $request)
    {
        $dolar = new Dolar();

        $dolar->precio = $request->precio;
        $dolar->fecha = $request->fecha;

        $dolar->save();

        return $this->index();
    }

    public function edit(Dolar $dolar)
    {
        return view('dolar.edit', compact('dolar'));
    }

    public function update(Request $request, Dolar $dolar)
    {
        $dolar->update($request->all());

        return redirect()->route('dolar.index');
    }

    public function destroy(Dolar $dolar)
    {
        $dolar->delete();

        return redirect()->route('dolar.index');
    }
}
