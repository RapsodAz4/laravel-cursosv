<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProyectoController extends Controller
{
    public function generarPDF()
    {
        $proyectos = Proyecto::all();
        $fecha = now()->format('d-m-Y');
        $pdf = Pdf::loadView('proyectos.pdf', compact('proyectos', 'fecha'));
        return $pdf->download('informe_proyectos.pdf');
    }

    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NombreProyecto' => 'required|string|max:255',
            'fuenteFondos' => 'required|string|max:255',
            'MontoPlanificado' => 'required|numeric',
            'MontoPatrocinado' => 'required|numeric',
            'MontoFondosPropios' => 'required|numeric',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado.');
    }

    public function edit(Proyecto $proyecto)
    {
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado.');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado.');
    }
}
