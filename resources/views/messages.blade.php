@csrf
@if (session('success'))
<!-- Ignorar ese error -->
<?php $data = Session::get('success') ?>
@if (is_array($data))
@foreach ($data as $message)
<div class="alert aler-success">
    <i class="fa fa-check"></i>
    {{$message}}
</div>
@endforeach
@else
<div class="alert aler-success" style="background-color: greenyellow;">
    <i class="fa fa-check"></i>
    <span style="color: black;">{{$data}}</span>
</div>
@endif
@endif

@if ( isset($errors) && count($errors) > 0 )
<div class="alert alert-warning">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif