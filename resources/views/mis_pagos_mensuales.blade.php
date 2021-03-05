@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>

        <div class="col-md-12 text-center" style="min-height:400px;">
          <hr>
          <h3 class="text-primary">Todos Mis Pagos Mensuales <i class="fas fa-info-circle"></i></h3>

          <table class="table table-hover">
  <thead style="background-color:#003366; color:#fff;">
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">*</th>

      <th scope="col">Plan</th>
      <th scope="col">Estado</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Fecha de Pago</th>
      <th scope="col">Acciòn</th>
    </tr>
  </thead>
  <tbody>
    @if(count($pm) == 0)
    <tr>
      <th scope="row">1</th>

      <td>No</td>
      <td>Tienes</td>
      <td>Pagos</td>
      <td>Pagos</td>
      <td>Pagos</td>
      <td></td>

    </tr>
    @else
    @foreach($pm as $m)

    <tr>
      <th scope="row">{{$m->id}}</th>
      <th scope="row"><img src="{{URL::to('/') }}/{{$m->membresia}}.png" width="50px;"/></th>
      <td style="font-size:12px;">{{substr($m->plan,0,30)}}...</td>

      @if($m->status == 0)
           <td class="text-success">Pagado <i class="fas fa-toggle-on"></i></td>
      @else
          <td class="text-warning">Pendiente <i class="fas fa-toggle-off"></i></td>
      @endif

      <td>
        <h4 style="font-size:16px;">$ {{number_format($m->cantidad, 2, ',', ' ')}}</h4>

      </td>

      <td>
        {{$m->fecha_liberacion}}

      </td>

      <td>
        @if(\Carbon\Carbon::now()->gte($m->fecha_liberacion))
        @if($m->status == 0)
          <button class="btn btn-outline-success btn-sm">PAGADO <i class="fas fa-check-circle"></i></button>
        @else
          <button class="btn btn-primary btn-sm">Realizar Pago <i class="fas fa-dollar-sign"></i></button>
          @endif

        @endif
      </td>
    </tr>
    @endforeach
    @endif



  </tbody>
</table>

        </div>
    </div>
</div>

<script>
function check_mail(){
  if($("#mail_access").val() == ""){
      alert("Ingresa tu email en el campo.");
      $("#mail_access").focus();
  }else{
    check($("#mail_access").val());
  }
}




function check(mail){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
      $.ajax({
      type: "POST",
      url: 'https://www.goicoindeveloper.com/api/search_email',
      data: {
            api_key: 'M4ST3RK3Y00000001',
            email: mail
      },
      success: function(respuesta) {
        if(respuesta.state == 0){
            $("#modal_body").empty();
            $("#modal_body").append('<div class=="text-center">'+
            '<h4 class="text-danger">No tienes una cuenta vinculada <i class="fas fa-times"></i></h4>'+
            '<div class="alert alert-warning" role="alert"><p class="text-danger">Para poder usar esta plataforma primero debes de crear una wallet...</p></div>'+
            '<a class="btn btn-success" target="_blank" href="https://www.goicoindeveloper.com/register">Crear Wallet <i class="fas fa-wallet"></i></a></div>');
        }
        if(respuesta.state == 1){
          make_login(respuesta.email,respuesta.nick_pass,respuesta.name);
        }
      },
      error: function(error) {
            alert("Hubo un error de red, intenta nuevamente!!s");
            location.reload();
        }
      });
}


function make_login(mail_id,n_pass,n_name){
  var form = document.createElement("form");
  var element1 = document.createElement("input");
  var element2 = document.createElement("input");
  var element3 = document.createElement("input");
  var element4 = document.createElement("input");
  form.method = "POST";
  form.action = "{{URL::to('/') }}/multilogin";

  element1.value="{{ csrf_token() }}";
  element1.name="_token";
  form.appendChild(element1);

  element2.value=mail_id;
  element2.name="email";
  form.appendChild(element2);

  element3.value=n_pass;
  element3.name="nick_pass";
  form.appendChild(element3);

  element4.value=n_name;
  element4.name="name";
  form.appendChild(element4);


  document.body.appendChild(form);
  form.submit();
}


$( document ).ready(function() {
  $("#saldo_gois").empty();
  $("#saldo_gois").append("Saldo (Gois): ${{$user->saldo}} <i class='fas fa-coins'></i> ");
});
</script>

@endsection
