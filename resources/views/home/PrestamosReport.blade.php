<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

    <h2 style="text-align: center;">Reporte de Prestamos</h2>
    <br>
    <p>Correo: {{auth()->user()->email}} <br> Usuario: {{auth()->user()->name}}</p>
    
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
                    
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>

    
</body>

</html>