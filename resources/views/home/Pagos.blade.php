@extends('app')

@section('title')
<title>Realizar Pago</title>
@endsection

@section('content')

<div class="container w-25 border p-4 mt-4">

    <form action="{{ route('Pagar', ['id_pres' => $id_pres]) }}" method="post">
        @csrf

        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success' )}}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        <div class="mb-3">
            <label for="monto" class="form-label">Monto a pagar</label>
            <div class="input-group">
                <input type="number" class="form-control" aria-label="" name="monto">
                <span class="input-group-text">$</span>
                <span class="input-group-text">0.00</span>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>
</div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection