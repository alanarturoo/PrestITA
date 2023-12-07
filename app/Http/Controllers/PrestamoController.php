<?php

namespace App\Http\Controllers;

use App\Models\prestamo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('home.sPrestamo');
        }
        return redirect('login')->withErrors('User Required');
    }

    public function store(Request $request)
    {

        $request->validate([
            'capital' => 'required',
            'porcentaje' => 'required',
            'nMeses' => 'required',
            'corte' => 'required'
        ]);

        $prestamo = new prestamo();
        $prestamo->capital = $request->capital;
        $prestamo->porcentaje = intval($request->porcentaje);
        $prestamo->nMeses = $request->nMeses;
        $prestamo->corte = $request->corte;
        $prestamo->user_id = auth()->user()->id;
        $prestamo->pagado = 0;
        $prestamo->save();
        return redirect()->route('solicitar-prestamo')->with('success', 'Prestamo Aprobado');
    }

    public function show()
    {
        if (Auth::check()) {
            // $prestamo = prestamo::where('users_id', auth()->user()->id);
            $prestamo = prestamo::where('user_id', '=', auth()->user()->id)->get();

            // $prestamo = prestamo::all();
            return view('home.vmPrestamos', ['prestamos' => $prestamo]);
        }

        return redirect('login')->withErrors('User Required');
    }
    public function report(){
        if (Auth::check()) {
            
            $prestamos = prestamo::where('user_id', '=', auth()->user()->id)->get();

            $pdf = Pdf::loadView('home.PrestamosReport', ['prestamos' => $prestamos]);
            
            return $pdf->stream('Prestamos.pdf');
        }

        return redirect('login')->withErrors('User Required');
    }
}
