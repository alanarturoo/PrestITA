@extends('app')


@section('title')
<title>Mis Prestamos</title>
@endsection


@section('content')

<div class="d-flex justify-content-center">
    <table class="table ml container">
        <thead>
            <tr>
                <th scope="col">#Prestamo</th>
                <th scope="col">#Pago</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha del pago</th>
                <th scope="col">Eliminar Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestamos as $prestamo)

            @foreach ($prestamo->pagos as $pago)

            <tr>
                <th scope="row">{{$pago->prestamo_id}}</th>
                <th scope="row">{{$pago->id}}</th>
                <th scope="row">{{$pago->monto}}</th>
                <th scope="row">{{substr($pago->created_at,0,10)}}</th>
                <td scope="row">
                    <a href="{{ route( 'eliminar-pago', ['id_pago' => $pago->id] ) }}" class="btn btn-danger btn-sm mr-0 pr-0">
                        Eliminar
                    </a>
                </td>
            </tr>
            @endforeach


            @endforeach
        </tbody>
    </table>


</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tabla de pagos</div>

                <div class="card-body">

                <h2>{{ $chart->options['chart_title'] }}</h2>
            {!! $chart->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>





<a href="{{ route( 'Pagos-Reporte' ) }}" style="padding: 1vh;" id="boton-flotante">
    Reporte PDF
</a>

@endsection

@section('script')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection