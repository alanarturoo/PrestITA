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
                    <th scope="col">#Prestamo</th>
                    <th scope="col">#Pago</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha del pago</th>
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

                </tr>
                @endforeach


                @endforeach
            </tbody>
        </table>
        



    </div>
    
</body>

</html>