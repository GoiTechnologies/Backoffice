@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:#003366; color:#fff;">
                  <div class="row">
                    <div class="col-lg-2 text-center">
                      <img src="{{URL::to('/') }}/us.png" width="70%;"/>
                    </div>
                  <div class="col-lg-2">
                    <h5> <i class="fas fa-user-circle"></i> Usuario:</h5>
                    {{ $user->name }}<br>
                    <div class="dropdown">
                      <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Màs Opciones <i class="fas fa-user-plus"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <form method="post" action="{{URL::to('/') }}/cambio_contrasena" id="form-id1">
                           @csrf
                        <input value="{{$user->email}}" name="email" hidden/>
                        <a class="dropdown-item" href="#"
                         onclick="document.getElementById('form-id1').submit();">
                          <i class="fas fa-key"></i> Cambiar PIN </a>
                      </form>

                      <form method="post" action="{{URL::to('/') }}/kyc" id="form-id2">
                         @csrf
                      <input value="{{$user->email}}" name="email" hidden/>
                      <a class="dropdown-item" href="#"
                       onclick="document.getElementById('form-id2').submit();">
                        <i class="fas fa-file-upload"></i> KYC Documentaciòn </a>
                    </form>


                    <form method="post" action="{{URL::to('/') }}/mis_membresias" id="form-id3">
                       @csrf
                    <input value="{{$user->email}}" name="email" hidden/>
                    <a class="dropdown-item" href="#"
                     onclick="document.getElementById('form-id3').submit();">
                      <i class="fas fa-stream"></i> Mis Membresias </a>
                  </form>


                  <form method="post" action="{{URL::to('/') }}/mis_pagos_mensuales" id="form-id4">
                     @csrf
                  <input value="{{$user->email}}" name="email" hidden/>
                  <a class="dropdown-item" href="#"
                   onclick="document.getElementById('form-id4').submit();">
                    <i class="fas fa-money-bill-alt"></i> Mis Pagos Mensuales</a>
                </form>

                <form method="post" action="{{URL::to('/') }}/mis_transacciones" id="form-id5">
                   @csrf
                <input value="{{$user->email}}" name="email" hidden/>
                <a class="dropdown-item" href="#"
                 onclick="document.getElementById('form-id5').submit();">
                  <i class="fas fa-exchange-alt"></i> Mis Transacciones</a>
              </form>



                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <h5><i class="fas fa-envelope-square"></i> Email:</h5>
                    {{ $user->email }}
                  </div>
                  <div class="col-lg-6">
                    <h5><i class="fas fa-wallet"></i> Wallet:</h5>
                    <p style="font-size:12px;">{{ $user->wallet }}<br>
                  </div>
                  </div>

                </div>

<div class="card-body">

  <div class="row">
      <div class="col-md-6">
        <div class="panel"  style="height:100px; background-color:grey; margin-right:15px; padding:15px;">
          <div class="row">
            <div class="col-md-10">
              <h5 style="margin-top:10px; color:#fff;">Monedas Disponibles</h5>
            </div>
            <div class="col-md-2">

            </div>
            <hr><br>
            <div class="col-md-4">
              <span class="badge badge-pill badge-light" style="font-size:16px; width:99%;">
                MXN: {{$user->saldo_mx}}</span>
            </div>
            <div class="col-md-4">
              <span class="badge badge-pill badge-light" style="font-size:16px; width:99%;">
                USA: {{$user->saldo_usa}}</span>
            </div>
            <div class="col-md-4">
              <span class="badge badge-pill badge-light" style="font-size:16px; width:99%;">
                GOI: {{number_format($user->saldo, 2, ',', ' ')}}</span>
            </div>

          </div>
        </div>
      </div>



      <div class="col-md-6">
        <div class="panel"  style="height:100px; background-color:grey; margin-right:15px; padding:15px;">
          <div class="row">
            <div class="col-md-6">
              <h5 style="margin-top:10px; color:#fff;">Membresia Actual</h5>



                    <form method="post" action="{{URL::to('/') }}/catalogo_membresias">
                       @csrf
                      <input value="{{$user->email}}" name="email" hidden/>
                          <button class="btn btn-info btn-sm" style="font-size:12px;" type="submit">
                            Catalogo de Membresias <i class="fas fa-stream"></i>
                          </button>
                    </form>



            </div>
            <div class="col-md-6">

              @if(!$mem)
                <img  src="{{URL::to('/') }}/default.png" width="100%" height="80%"/>
              @else
                    <img  src="{{URL::to('/') }}/{{$mem->membresia}}.png" width="100%" height="85%"/>
              @endif





            </div>
          </div>
        </div>
      </div>

<div class="col-md-12" style="height:15px;"></div>


      <div class="col-md-6">
        <div class="panel"  style="height:300px; background-color:grey; margin-right:15px; padding:15px;">
          <div class="row">
            <div class="col-md-12">

              <div style="background-color:#fff;">
                <h5 style="margin-top:10px; color:#003366;;">Mis Saldos Disponibles</h5>
              <canvas id="myChart" ></canvas>
            </div>
            </div>

          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="panel"  style="height:300px; background-color:grey; margin-right:15px; padding:15px;">
          <div class="row">
            <div class="col-md-12">
              <h5 style="margin-top:10px; color:#fff;">Ultimos Movimientos</h5>

              <table class="table table-hover">
  <thead style="background-color:#003366; color:#fff;">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Receptor</th>
      <th scope="col">Monto $</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody style="background-color:#fff; color:#000;" id="table_trans">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            </div>




          </div>
        </div>
      </div>


  </div>







                </div>
            </div>
        </div>
    </div>
</div>

<script>

function get_transacctions(wa){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
      $.ajax({
      type: "POST",
      url: 'https://www.goicoindeveloper.com/api/get_last_20_transactions',
      data: {
            api_key: 'M4ST3RK3Y00000001',
            wallet: wa
      },
      success: function(respuesta) {
        $("#table_trans").empty();
        cont = 1;
        $.each(respuesta, function( index, value ) {
            if(cont <= 3){
              $("#table_trans").append('  <tr>'+
                  '<th scope="row">'+cont+'</th>'+
                  '<td><p style="font-size:10px;">Wallet: '+value.receiver.slice(-10)+'</p></td>'+
                  '<td><p style="font-size:12px;"><span class="badge badge-primary">$: '+value.amount+' GOI(s)</span></p></td>'+
                '  <td><p style="font-size:10px;">'+value.created_at+'</p></td>'+
                '</tr>');
                cont++;
              }
        });
      },
      error: function(error) {
            location.reload();
        }
      });
}




$( document ).ready(function() {
  $("#saldo_gois").empty();
  $("#saldo_gois").append("Saldo (Gois): ${{number_format($user->saldo, 2, ',', ' ')}} <i class='fas fa-coins'></i> ");
  get_transacctions('{{$user->wallet}}');
});
</script>



<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Goicoin', 'Peso MXN', 'Dollar Usa'],
        datasets: [{
            label: 'Balance General de Monedas',
            data: ['{{$user->saldo}}', '{{$user->saldo_mx}}', '{{$user->saldo_usa}}'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection
