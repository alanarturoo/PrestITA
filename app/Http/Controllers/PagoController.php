<?php

namespace App\Http\Controllers;

use App\Models\pago;
use App\Models\prestamo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class PagoController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            $prestamos = prestamo::where('user_id', '=', auth()->user()->id)->get();

            $options = [
                'chart_title' => 'Pagos por Mes',
                'report_type' => 'group_by_date',
                'model' => 'App\Models\pago',
                'group_by_field' => 'created_at',
                'group_by_period' => 'month',
                'chart_type' => 'bar',
            ];

            // $options = [
            //     'chart_title'           => 'pagos',
            //     'chart_type'            => 'line',
            //     'report_type'           => 'group_by_date',
            //     'model'                 => 'App\Models\pago',
            //     'group_by_field'        => 'created_at',
            //     'group_by_period'       => 'day',
            //     'aggregate_function'    => 'count',
            //     'filter_field'          => 'created_at',
            //     'filter_days'           => '30',
            //     'group_by_field_format' => 'Y-m-d H:i:s',
            //     'column_class'          => 'col-md-12',
                
            //     'continuous_time'       => true,
            // ];

            $chart = new LaravelChart($options); 
            
            return view('home.vmPagos', ['prestamos' => $prestamos, 'chart' => $chart]);
        }
        return redirect('login')->withErrors('User Required');
    }

    public function index($id)
    {
        return view('home.Pagos', ['id_pres' => $id]);
    }

    public function store(Request $request, $id_pres)
    {

        $request->validate([
            'monto' => 'required'
        ]);

        $pago = new pago;
        $pago -> monto = $request -> monto;
        $pago -> prestamo_id = $id_pres;

        $pago->save();

        return redirect()->route('realizar-pago', ['id_pres' => $id_pres])->with('success', 'pago realizado de manera correcta');
    }

    public function report()
    {
        if (Auth::check()) {
            
            $prestamos = prestamo::where('user_id', '=', auth()->user()->id)->get();

            $pdf = Pdf::loadView('home.PagosReport', ['prestamos' => $prestamos]);
            
            return $pdf->stream('Pagos.pdf');
        }
        return redirect('login')->withErrors('User Required');
    }

    public function delete($id_pago){
        $pago = pago::find($id_pago);

        if (isset($pago)) {
            $pago->delete();
        }
        return redirect()->route('pagos');
    }
}
