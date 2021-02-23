@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>

        <div class="col-md-12 text-center">
          <br>
                <div class="alert alert-primary" role="alert"><h3 class="text-primary" style="cursor:pointer;">
                  Detalles de Inversiòn <i class="fas fa-money-check-alt"></i></h3></div>
                  <hr>
        </div>
        <div class="col-md-2 text-center"></div>
        <div class="col-md-3 text-center"><br>
                  <img src="{{URL::to('/') }}/{{$membresia}}.png" width="100%"/>
        </div>
        <div class="col-md-5 text-center">
                  <h5><span class="badge badge-pill badge-primary" style="width:300px;">Inversiòn: {{$plan}}</span><br>

                  <b style="font-size:36px;">Total: ${{number_format($cantidad, 2, '.', ' ')}} Mxn</b><br>
                  Vigencia: {{$duracion}}
                  <hr>
                </h5>
                <p>{{$info}}</p>

        </div>
        <div class="col-md-2 text-center"></div>
        <div class="col-md-12 text-center">
          <hr>



          <form action="{{URL::to('/') }}/procesar_pago_inversion" method="post">
              @csrf
              <input value="{{$user->email}}" name="email" hidden/>
              <input value="{{$cantidad}}" name="cantidad" hidden/>
              <input value="{{$duracion}}" name="duracion" hidden/>
              <input value="{{$membresia}}" name="membresia" hidden/>
              <input value="{{$plan}} - {{$info}}" name="plan" hidden/>
          <button class="btn btn-primary" style="width:250px;" type="submit">
            Pago Wallet Goicoin <i class="fas fa-wallet"></i>
          </button>
        </form>




          <br>
          <button class="btn btn-info"  style="width:250px;">
            Pagar con Otro <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i>
          </button>
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
