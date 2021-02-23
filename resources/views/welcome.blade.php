<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BackOffice</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e838e8d238.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- Styles -->
        <style>

            body {
 background-image: url("bg01.jpg");
 background-color: #cccccc;
 height: 100%;

  /* Center and scale the image nicely */

  background-repeat: no-repeat;
  background-size: cover;
}


        </style>
    </head>
    <body>
        <div style="padding:25px;">

          <button type="button" class="btn btn-primary"
          style="margin-left:75%; margin-top:-10px; width:200px; height:50px;"
          data-toggle="modal" data-target="#exampleModal">
            Acceder a mi Cuenta <i class="fas fa-user-circle"></i>
          </button>

        </div>








<!-- Modal -->
<div class="modal fade" id="exampleModal"
style="margin-top:10%;"
 tabindex="-1" role="dialog"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-left:30%;">Acceder a la Cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body text-center" id="modal_body" style="background-color:#003366; color:#fff;">
        <h5 class="text-light">Email:</h5>
        <input class="form-control" id="mail_access" placeholder="ejemplo@tumail.com" style="width:250px; margin-left:25%;"
        value=""/>
        <h5 class="text-light">PIN:</h5>
        <input class="form-control" id="pin" placeholder="****" style="width:100px; margin-left:39%;"
        value="" type="password" maxlength="4"/>
        <br>
        <button type="button" class="btn btn-primary" onclick="check_mail();">
          Comprobar <i class="fas fa-info-circle"></i></button>

      </div>

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
        if(respuesta.pin == $("#pin").val()){
        if(respuesta.state == 0){
            $("#modal_body").empty();
            $("#modal_body").append('<div class=="text-center">'+
            '<h4 class="text-danger">No tienes una cuenta vinculada <i class="fas fa-times"></i></h4>'+
            '<div class="alert alert-warning" role="alert"><p class="text-danger">Para poder usar esta plataforma primero debes de crear una wallet...</p></div>'+
            '<a class="btn btn-success" target="_blank" href="https://www.goicoindeveloper.com/register">Crear Wallet <i class="fas fa-wallet"></i></a></div>');
        }
        if(respuesta.state == 1){
          make_login(respuesta.email,respuesta.nick_pass,respuesta.name,respuesta.wallet,respuesta.balance);
        }
      }else{
          alert("No Autorizado, Claves invalidas!");
          window.location.replace("{{URL::to('/') }}/no_autorizado");
      }

      },
      error: function(error) {
            alert("Hubo un error de red, intenta nuevamente!!");
            location.reload();
        }
      });
}


function make_login(mail_id,n_pass,n_name,wallet,saldo){
  var form = document.createElement("form");
  var element1 = document.createElement("input");
  var element2 = document.createElement("input");
  var element3 = document.createElement("input");
  var element4 = document.createElement("input");
  var element5 = document.createElement("input");
  var element6 = document.createElement("input");
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

  element5.value=wallet;
  element5.name="wallet";
  form.appendChild(element5);

  element6.value=saldo;
  element6.name="saldo";
  form.appendChild(element6);

  document.body.appendChild(form);
  form.submit();
}
</script>
    </body>
</html>
