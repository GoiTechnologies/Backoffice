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
          <h3 class="text-danger">No tienes Saldo Suficiente en tu Wallet <i class="fas fa-ban"></i></h3>
          <hr>

          <div class="alert alert-danger" role="alert">
              <strong>Error de Fondos. El usuario no puede realizar la siguiente acciòn, posibles causas:</strong><br>
              - Tus Fondos son insuficientes.<br>
              - Error de membresia.<br>
              - Necesitas Recargar GOI`s para procesar pago.<br>
              - Ir a Recagrar GOI Aquì.
            </div>


        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>



@endsection
