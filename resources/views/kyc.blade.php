@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>
        <div class="col-md-12">
              <div class="alert alert-primary" role="alert">
                <h3 class="text-primary text-bold">Documentaciòn KYC</h3>
              </div>
        </div>
        <div class="col-md-3">
            <img src="{{URL::to('/') }}/default01.png" width="100%" style="cursor:pointer;"/>
        </div>
        <div class="col-md-9">
            <b>Nombre:</b>
            <input class="form-control" placeholder="Tu(s) Nombre(s)..." />
            <b>Apellido Paterno:</b>
            <input class="form-control" placeholder="Tu primer apellido..." />
            <b>Apellido Materno:</b>
            <input class="form-control" placeholder="Tu segundo apellido.." />
            <hr>
            <b>Fecha de Nacimiento:</b>
            <input type="date" id="start" name="trip-start"
             value=""
             min="2018-01-01" max="2018-12-31">
             <hr>
             <b>RFC (Numero de Registro Federal de Contribuyentes):</b>
             <input class="form-control" placeholder="Ingresa el RFC con Homoclave.." />

             <b>Tipo de Documento:</b>
             <input class="form-control" placeholder="Que tipo? INE , Cartilla, Licencia, Pasaporte, otro.." />

             <b>Numero de Documento:</b>
             <input class="form-control" placeholder="Ingresa el Folio, numero o id que expide el documento" />
        </div>
        <div class="col-md-12"> <hr></div>
        <div class="col-md-4">
          <b>Frente de Documento:</b>
          <input type="file" id="img" name="img" accept="image/*">
        </div>
        <div class="col-md-4">
          <b>Reverso de Documento:</b>
          <input type="file" id="img" name="img" accept="image/*">
        </div>
        <div class="col-md-4">
          <b>Comprobante de Domicilio:</b>
          <input type="file" id="img" name="img" accept="image/*">
        </div>
        <div class="col-md-12 text-right">
          <br>
            <button class="btn btn-success btn-lg">Enviar Documentaciòn <i class="fas fa-check-square"></i></button>
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
