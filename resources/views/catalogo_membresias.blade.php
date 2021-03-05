@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>

        <div class="col-md-4 text-center">
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Membresia Estandar</h5></div>
            <div class="panel-body">
              <img src="{{URL::to('/') }}/estandar.png" width="90%"/>
              <hr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Ver Detalles <i class="fas fa-info-circle"></i>
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-4 text-center">
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Membresia Premium</h5></div>
            <div class="panel-body">
              <img src="{{URL::to('/') }}/premium.png" width="90%"/>
              <hr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal2">
                Ver Detalles <i class="fas fa-info-circle"></i>
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-4 text-center">
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Membresia Elite</h5></div>
            <div class="panel-body">
              <img src="{{URL::to('/') }}/elite.png" width="90%"/>
              <hr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal3">
                Ver Detalles <i class="fas fa-info-circle"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-md-12 text-center"><hr></div>

        <div class="col-md-4 text-center">
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Membresia Gold</h5></div>
            <div class="panel-body">
              <img src="{{URL::to('/') }}/gold.png" width="90%"/>
              <hr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal4">
                Ver Detalles <i class="fas fa-info-circle"></i>
              </button>
            </div>
          </div>
        </div>



        <div class="col-md-4 text-center">
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Membresia Empresarial</h5></div>
            <div class="panel-body">
              <img src="{{URL::to('/') }}/empresarial.png" width="90%"/>
              <hr>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal5">
                Ver Detalles <i class="fas fa-info-circle"></i>
              </button>
            </div>
          </div>
        </div>

    </div>
</div>












<!-- Modal -->
<div class="modal fade" id="exampleModal" style="margin-top:5%;"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Membresia Estandar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-8">
          <p  style="font-size:14px;"class="text-primary">Costo de Apertura: $ 1,500.00 MXN<br>
          Costo de Mensualidad: $ 500.00 MXN</p>
        </div>
        <div class="col-md-4">
          <img src="{{URL::to('/') }}/estandar.png" width="90%"/>
        </div>
        <div class="col-md-12">
          <hr>
          <p>Planes de Inversion Disponibles en esta Membresia</p>
        </div>


        <div class="col-md-12">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 12</div>
            <div class="panel-body">12 Meses Rendimiento Fijo <br>20% Mesual / Opciòn  de Ahorro 5% Interès<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 50,000 MXN </span></p>
            </div>
          </div>
        </div>



<div class="col-md-12">
  <hr>

  <form action="{{URL::to('/') }}/comprar_membresia" method="post">
    @csrf
    <select class="form-control" name="plan" required hidden>
      <option value="12 Meses">Plan 12 Meses</option>
    </select><br>
    <input value="{{$user->email}}" name="email" hidden/>
    <input value="estandar" name="membresia" hidden/>
    <input class="form-control" value="2000"
        style="width:210px;"
     name="cantidad" type="number" required hidden/>
     <h3 class="text-primary">Total: $ 2,000.00 Mxn</h3>
    <button type="submit"
    style="margin-left:320px; margin-top:-65px; width:120px;"
    class="btn btn-primary">
      Comprar <i class="fas fa-dollar-sign"></i></button>
  </form>

</div>




        </div>

      </div>

    </div>
  </div>
</div>










<!-- Modal -->
<div class="modal fade" id="exampleModal2" style="margin-top:0%;"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel2">Membresia Premium</h5>
        <button type="button" class="close" data-dismiss="modal" ar2ia-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-8">
          <p>Costo de Apertura: 10,000.00 MXN<br>
          Costo de Mensualidad: 2500.00 MXN</p>
        </div>
        <div class="col-md-4">
          <img src="{{URL::to('/') }}/premium.png" width="90%"/>
        </div>
        <div class="col-md-12">
          <hr>
          <p>Planes de Inversion Disponibles en esta membresia</p>
        </div>


        <div class="col-md-12">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 12</div>
            <div class="panel-body">12 Meses Rendimiento Fijo <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 50,000.00 a 350,000 MXN </span></p>
            </div>
          </div>
        </div>



<div class="col-md-12">
  <hr>
  <form action="{{URL::to('/') }}/comprar_membresia" method="post">
    @csrf
    <select class="form-control" name="plan" required hidden>
      <option value="12 Meses">Plan 12 Meses</option>
    </select><br>
    <input value="{{$user->email}}" name="email" hidden/>
    <input value="premium" name="membresia" hidden/>
    <h4 class="text-primary">Total: $ 4,750.00 Mxn</h4>
    <input class="form-control"
        style="width:210px;" value="4750"
     name="cantidad" type="number" required hidden/>
    <button type="submit"
    style="margin-left:250px; margin-top:-65px; width:210px;"
    class="btn btn-primary">
      Comprar Membresia <i class="fas fa-dollar-sign"></i></button>
  </form>
</div>




        </div>

      </div>

    </div>
  </div>
</div>









<!-- Modal -->
<div class="modal fade" id="exampleModal3" style="margin-top:3%;"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3">Membresia Elite</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-8">
          <p>Costo de Apertura: 60,000.00 MXN<br>
          Costo de Mensualidad: 15,000.00 MXN</p>
        </div>
        <div class="col-md-4">
          <img src="{{URL::to('/') }}/elite.png" width="90%"/>
        </div>
        <div class="col-md-12">
          <hr>
          <p>Planes de Inversion Disponibles en esta membresia</p>
        </div>

        <div class="col-md-12" style="margin-bottom:10px;">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 12</div>
            <div class="panel-body">12 Meses Rendimiento Fijo <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2500.00 a 15,000.00 MXN </span></p>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Quiero Invertir</div>
            <div class="panel-body">12 Meses R.I. <br>20% Rendimiento Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 9,999,999 MXN </span></p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#003366; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 150</div>
            <div class="panel-body">12 Meses <br>150% Rendimiento<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 15,000 MXN </span></p>
            </div>
          </div>
        </div>

<div class="col-md-12">
  <hr>
  <form action="{{URL::to('/') }}/comprar_membresia" method="post">
    @csrf
    <select class="form-control" name="plan" required hidden>
      <option value="12 Meses">Plan 12 Meses</option>
    </select><br>
    <input value="{{$user->email}}" name="email" hidden/>
    <input value="elite" name="membresia" hidden/>
    <h4 class="text-primary">Total: $ 75,000.00 Mxn</h4>
    <input class="form-control" value="75000"
        style="width:210px;"
     name="cantidad" type="number" required hidden/>
    <button type="submit"
    style="margin-left:250px; margin-top:-65px; width:210px;"
    class="btn btn-primary">
      Comprar Membresia <i class="fas fa-dollar-sign"></i></button>
  </form>
</div>




        </div>

      </div>

    </div>
  </div>
</div>






<div class="modal fade" id="exampleModal4" style="margin-top:0%;"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel4">Membresia Gold</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-8">
          <p>Costo de Apertura: 20,000.00 MXN<br>
          Costo de Mensualidad: 5,000.00 MXN</p>
        </div>
        <div class="col-md-4">
          <img src="{{URL::to('/') }}/gold.png" width="90%"/>
        </div>
        <div class="col-md-12">
          <hr>
          <p>Planes de Inversion Disponibles en esta membresia</p>
        </div>


        <div class="col-md-12">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 12</div>
            <div class="panel-body">12 Meses Rendimiento Fijo <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 3,000,000 MXN </span></p>
            </div>
          </div>
        </div>




        <div class="col-md-12"><hr></div>
        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#003366; color:#fff; padding:10px;">
            <div class="panel-heading">Plan Quiero Invertir</div>
            <div class="panel-body">Retorno Inversion 12 Mes <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 3,000,000.00 MXN </span></p>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#003366; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 150</div>
            <div class="panel-body">12 Meses <br>150% Rendimiento<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 9,000,000.00 MXN </span></p>
            </div>
          </div>
        </div>

<div class="col-md-12">
  <hr>
  <form action="{{URL::to('/') }}/comprar_membresia" method="post">
    @csrf
    <select class="form-control" name="plan" required hidden>
      <option value="12 Meses">Plan 12 Meses</option>
    </select><br>
    <input value="{{$user->email}}" name="email" hidden/>
    <input value="gold" name="membresia" hidden/>
    <h4 class="text-primary">Total: $ 25,000.00 Mxn</h4>
    <input class="form-control" value="25000"
        style="width:210px;"
     name="cantidad" type="number" required hidden/>
    <button type="submit"
    style="margin-left:250px; margin-top:-65px; width:210px;"
    class="btn btn-primary">
      Comprar Membresia <i class="fas fa-dollar-sign"></i></button>
  </form>
</div>




        </div>

      </div>

    </div>
  </div>
</div>










<div class="modal fade" id="exampleModal5" style="margin-top:0%;"
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel5">Membresia Empresarial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-8">
          <p>Costo de Apertura: 100,000.00 MXN<br>
          Costo de Mensualidad: 50,000.00 MXN</p>
        </div>
        <div class="col-md-4">
          <img src="{{URL::to('/') }}/empresarial.png" width="90%"/>
        </div>
        <div class="col-md-12">
          <hr>
          <p>Planes de Inversion Disponibles en esta membresia</p>
        </div>


        <div class="col-md-12">
          <div class="panel panel-primary text-center" style="background-color:#a1a1a1; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 12</div>
            <div class="panel-body">12 Meses Rendimiento Fijo <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 3,000,000 MXN </span></p>
            </div>
          </div>
        </div>




        <div class="col-md-12"><hr></div>
        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#003366; color:#fff; padding:10px;">
            <div class="panel-heading">Plan Quiero Invertir</div>
            <div class="panel-body">Retorno Inversion 12 Mes <br>20% Mensual<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 3,000,000.00 MXN </span></p>
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <div class="panel panel-primary text-center" style="background-color:#003366; color:#fff; padding:10px;">
            <div class="panel-heading">Plan 150</div>
            <div class="panel-body">12 Meses <br>150% Rendimiento<br>

                <p style="font-size:12px;"><span class="badge badge-pill badge-secondary"> Monto de 2,500.00 a 9,000,000.00 MXN </span></p>
            </div>
          </div>
        </div>

<div class="col-md-12">
  <hr>
  <form action="{{URL::to('/') }}/comprar_membresia" method="post">
    <select class="form-control" name="plan" required hidden>
      <option value="12 Meses">Plan 12 Meses</option>
    </select><br>
    @csrf
    <input value="{{$user->email}}" name="email" hidden/>
    <input value="empresarial" name="membresia" hidden/>
    <h4 class="text-primary">Total: $ 150,000.00 Mxn</h4>
    <input class="form-control" value="150000"
        style="width:210px;"
     name="cantidad" type="number" required hidden/>
    <button type="submit"
    style="margin-left:260px; margin-top:-65px; width:190px;"
    class="btn btn-primary">
      Comprar Membresia <i class="fas fa-dollar-sign"></i></button>
  </form>
</div>




        </div>

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
