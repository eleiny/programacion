<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiantes;



class PagesController extends Controller
{
    public function fnIndex()
    {
        return view('welcome');
    }

    public function fnEstDetalle($id)
    {
        $xDetAlumnos = Estudiantes::findOrFail($id);
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnRegistrar(Request $request)
    {
        $request->validate([
            'codEst' => 'required',
            'nomEst' => 'required',
            'apeEst' => 'required',
            'fnaEst' => 'required',
            'turMat' => 'required',
            'semMat' => 'required',
            'estMat' => 'required',
        ]);

        $nuevoEstudiante = new Estudiantes;

        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();

        return back()->with('msj', 'Se registró con éxito...');
    }

    public function fnLista()
    {
        $xAlumnos = Estudiantes::all();
        return view('pagLista', compact('xAlumnos'));
    }

    public function fnGaleria($numero = null)
    {
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }
}