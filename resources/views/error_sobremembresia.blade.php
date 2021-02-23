@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="location.href = 'https://www.goicoindeveloper.com/backoffice/';" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>
        <div class="col-md-12">
          <br><br>
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-8 text-center">
          <h3 class="text-danger">Error Ya Cuentas con esta Membresia <i class="fas fa-ban"></i></h3>
          <hr>

          <div class="alert alert-danger" role="alert">
              <strong>Error de Compra. No es posible adquirir la misma membresia, prueba con otra:</strong><br>
              - Solo 1 tipo de Membresia por usuario.<br>
              - La Session a Caducado.<br>
              - Ahora sera direccionado al inicio.<br>
              - Error de Intento de Compra Duplicada.
            </div>


        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>



@endsection
