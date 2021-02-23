@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>


        <div class="col-md-12 text-center" style="min-height:400px;">
          <hr>
          <h3 class="text-primary">Mis Membresias Adquiridas <i class="fas fa-info-circle"></i></h3>

          <table class="table table-hover">
  <thead style="background-color:#003366; color:#fff;">
    <tr>
      <th scope="col">IDE</th>
      <th scope="col">*</th>
      <th scope="col">Membresia</th>
      <th scope="col">Vigencia</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha de Compra</th>
      <th scope="col">Acciones</th>
      <th scope="col">Inversiones Activas</th>
    </tr>
  </thead>
  <tbody>
    @if(count($mem) == 0)
    <tr>
      <th scope="row">1</th>
      <td></td>
      <td>No</td>
      <td>Tienes</td>
      <td>Membresias</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    @else
      @foreach($mem as $m)

      <tr>
        <th scope="row">{{$m->id}}</th>
        <th scope="row"><img src="{{URL::to('/') }}/{{$m->membresia}}.png" width="50px;"/></th>
        <td>{{$m->membresia}}</td>
        <td>{{$m->plan}}</td>
        <td>
            @if($m->status == 1)
              <i class="fas fa-toggle-on text-success"></i>
            @else
            <i class="fas fa-toggle-on text-danger"></i>
            @endif
        </td>


        <td>{{$m->fecha_compra}}</td>
        <td><button class="btn btn-info btn-sm"  data-toggle="modal" style="width:270px;"
           data-target="#exampleModal{{$m->id}}">Planes {{strtoupper($m->membresia)}} <i class="fas fa-chart-line"></i></button></td>

           <td>
             <?php $stat =true; ?>
             @if(!$pm)
                Sin Inversiones <i class="fas fa-times"></i>

                @else
                @foreach($pm as $p)

                @if($p->membresia == $m->membresia)
                @if(count($pm) == 6)

                @if($stat)
                <button class="btn btn-outline-success btn-sm"><i class="fas fa-chart-line"></i> (6)</button>
                <?php $stat = false; ?>
                @endif
                @endif
                @if(count($pm) == 12)

                  @if($stat)
                <button class="btn btn-outline-success btn-sm"><i class="fas fa-chart-line"></i> (12)</button>
                <?php $stat = false; ?>
                @endif


                @endif

                @endif

                @endforeach

             @endif

             @if(0 == 0)


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












@foreach($mem as $m)

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$m->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$m->id}}">Planes Inversiòn Membresia: {{strtoupper($m->membresia)}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">



        @if($m->membresia == 'estandar')
        <h5 class="modal-title text-light"
          style="background-color:#000; padding:3px;"
        id="exampleModalLabel{{$m->id}}">Plan 12</h5>
        <h5>$2,500.00 Min a 50,000.00 Max<br>
        20% Rendimiento Mensual / 12 Meses<br>
        Opcion de Ahorro Habilitada 5% Interès Mensual
        <hr>
        <form action="{{URL::to('/') }}/comprar_inversion" method="post">
           @csrf
        <input name="membresia" value="estandar" hidden>
        <input name="email" value="{{$user->email}}" hidden>
        <input name="duracion" value="12 meses" hidden>
        <input name="plan" value="Plan 12" hidden>
        <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
        <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
        style="width:250px;" type="number" name="cantidad">
        <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
      </form>
      </h5>
      Esta acciòn genera un pull de pagos de tu inversion que deben ser cubiertos mensualmente
      durante el tiempo de inversiòn seleccionado.
      @endif


      @if($m->membresia == 'empresarial')
      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 12</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 50,000.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="empresarial" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 12" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan Quiero Invertir</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 9,999,999.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="empresarial" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <select class="form-control" name="duracion">
          <option value="12 Meses">12 Meses</option>
          <option value="6 Meses">6 Meses</option>
      </select>
      <input name="plan" value="Quiero Invertir" hidden>
      <input name="info" value="20% Rendimiento Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:295px; margin-top:-50px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 150</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 50,000.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="empresarial" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 150" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      @endif







      @if($m->membresia == 'elite')
      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 12</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 15,000.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="elite" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 12" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan Quiero Invertir</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 9,999,999.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="elite" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <select class="form-control" name="duracion">
          <option value="12 Meses">12 Meses</option>
          <option value="6 Meses">6 Meses</option>
      </select>
      <input name="plan" value="Plan Quiero Invertir" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:295px; margin-top:-50px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 150</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 15,000.00 Max<br>
      150% Rendimiento / 12 Meses + Retorno<br>
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="elite" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 150" hidden>
      <input name="info" value="150% Rendimiento 12 Meses Retorno de Inversiòn" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      @endif




      @if($m->membresia == 'gold')
      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 12</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 15,000.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="gold" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 12" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan Quiero Invertir</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 9,999,999.00 Max<br>
      20% Rendimiento Mensual / 12 Meses<br>
      Opcion de Ahorro Habilitada 5% Interès Mensual
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="elite" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <select class="form-control" name="duracion">
          <option value="12 Meses">12 Meses</option>
          <option value="6 Meses">6 Meses</option>
      </select>
      <input name="plan" value="Plan Quiero Invertir" hidden>
      <input name="info" value="20% Rendimiento Mensual / Opcion Ahorro 5% Interès Mensual" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:295px; margin-top:-50px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      <h5 class="modal-title text-light"
        style="background-color:#000; padding:3px;"
      id="exampleModalLabel{{$m->id}}">Plan 150</h5>
      <h5 style="font-size:12px;">$2,500.00 Min a 15,000.00 Max<br>
      150% Rendimiento / 12 Meses + Retorno<br>
      <hr>
      <form action="{{URL::to('/') }}/comprar_inversion" method="post">
         @csrf
      <input name="membresia" value="gold" hidden>
      <input name="email" value="{{$user->email}}" hidden>
      <input name="duracion" value="12 meses" hidden>
      <input name="plan" value="Plan 150" hidden>
      <input name="info" value="150% Rendimiento 12 Meses Retorno de Inversiòn" hidden>
      <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
      style="width:250px;" type="number" name="cantidad">
      <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
    </form>
      </h5>

      @endif








              @if($m->membresia == 'premium')
              <h5 class="modal-title text-light"
                style="background-color:#000; padding:3px;"
              id="exampleModalLabel{{$m->id}}">Plan 12</h5>
              <h5>$2,500.00 Min a 50,000.00 Max<br>
              20% Rendimiento Mensual / 12 Meses<br>
              Opcion de Ahorro Habilitada 5% Interès Mensual
              <hr>
              <form action="{{URL::to('/') }}/comprar_inversion" method="post">
                 @csrf
              <input name="membresia" value="premium" hidden>
              <input name="email" value="{{$user->email}}" hidden>
              <input name="duracion" value="12 meses" hidden>
              <input name="plan" value="Plan 12" hidden>
              <input name="info" value="150% Rendimiento 12 Meses Retorno de Inversiòn" hidden>
              <input class="form-control" placeholder="Ingrese Cantidad a Invertir $"
              style="width:250px;" type="number" name="cantidad">
              <button class="btn btn-info" style="margin-left:285px; margin-top:-70px;">Pagar Inversiòn <i class="fas fa-money-bill-wave"></i></button>
            </form>
            </h5>
            Esta acciòn genera un pull de pagos de tu inversion que deben ser cubiertos mensualmente
            durante el tiempo de inversiòn seleccionado.
            @endif




      </div>
    </div>
  </div>
</div>
@endforeach


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
