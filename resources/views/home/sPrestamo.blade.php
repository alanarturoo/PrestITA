@extends('app')


@section('title')
<title>Prestamos</title>
@endsection


@section('content')


<div style="height: 77vh;">
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('solicitar-prestamo') }}" method="post">
            @csrf

            @include('messages')

            <div class="mb-3">
                <label for="capital" class="form-label">Capital</label>
                <div class="input-group">
                    <input type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="capital">
                    <span class="input-group-text">$</span>
                    <span class="input-group-text">0.00</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="porcentaje" class="form-label">Porcentaje de interes</label>
                <div class="input-group">
                    <input type="number" class="form-control" aria-label="" name="porcentaje">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="canMeses" class="form-label">Cantidad de meses</label>
                <select class="form-select" aria-label="Default select example" name="nMeses">
                    <option selected>Meses</option>
                    <option value="6">6 meses</option>
                    <option value="12">12 meses</option>
                    <option value="18">18 meses</option>
                    <option value="24">24 meses</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="canMeses" class="form-label">Periodo de Interes (corte)</label>
                <select class="form-select" aria-label="Default select example" name="corte">
                    <option selected>Corte</option>
                    <option value="1">Mensual</option>
                    <option value="2">Bimestral</option>
                    <option value="6">Semestral</option>
                    <option value="12">Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Solicitar Prestamo</button>
        </form>

    </div>
</div>
<br>
@endsection