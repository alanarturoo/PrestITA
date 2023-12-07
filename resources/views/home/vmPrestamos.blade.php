@extends('app')


@section('title')
<title>Mis Prestamos</title>
@endsection


@section('content')
<div style="height: 82vh;">
    <div class="d-flex justify-content-center">
        <table class="table ml container">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Capital</th>
                    <th scope="col">&nbsp;%&nbsp;</th>
                    <th scope="col">Meses</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pagado</th>
                    <th scope="col">Restante</th>
                    <th scope="col">Fecha del Prestamo</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Pagar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prestamos as $prestamo)
                <tr>
                    <th scope="row">{{$prestamo->id}}</th>
                    <th scope="row">{{$prestamo->capital}}</th>
                    <th scope="row">{{$prestamo->porcentaje}}</th>
                    <th scope="row">{{$prestamo->nMeses}}</th>
                    <th scope="row">{{$prestamo->total}}</th>
                    <th scope="row">{{$prestamo->pagado}}</th>
                    <th scope="row">{{$prestamo->restante}}</th>
                    <th scope="row">{{substr($prestamo->created_at,0,10)}}</th>
                    @if ($prestamo->deuda === 1)
                    <th scope="row" style="background-color: greenyellow;">Pagado</th>
                    @else
                    <th scope="row" style="background-color: red;">En deuda</th>
                    @endif
                    <td scope="row">
                        <a href="{{ route( 'realizar-pago', ['id_pres' => $prestamo->id] ) }}" class="btn btn-warning btn-sm mr-0 pr-0">
                            Realizar un pago
                        </a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>



    </div>

</div>

<a href="{{ route( 'Prestamos-Reporte' ) }}" style="padding: 1vh;" id="boton-flotante">
    Reporte PDF
</a>

@endsection