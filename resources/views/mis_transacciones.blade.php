@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <h3 onclick="history.back()" style="cursor:pointer;"><i class="fas fa-arrow-circle-left"></i> Regresar al BackOffice</h3>
        </div>



        <div class="col-md-12 text-center" style="min-height:400px;">
          <hr>
          <h3 class="text-primary">Mis Ultimas Transacciones <i class="fas fa-exchange-alt"></i></h3>

          <table class="table table-hover">
  <thead style="background-color:#003366; color:#fff;">
    <tr>
      <th scope="col">IDE</th>
      <th scope="col">Membresia</th>
      <th scope="col">Status</th>
      <th scope="col">Fecha de Compra</th>
    </tr>
  </thead>
  <tbody id="table_trans">
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>


  </tbody>
</table>

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

        $.each(respuesta, function( index, value ) {

              $("#table_trans").append('  <tr>'+
                  '<th scope="row">'+index+'</th>'+
                  '<td><p style="font-size:14px;">Wallet: '+value.receiver.slice(-10)+'</p></td>'+
                  '<td><p style="font-size:14px;"><span class="badge badge-primary">$: '+value.amount+' GOI(s)</span></p></td>'+
                '  <td><p style="font-size:14px;">'+value.created_at+'</p></td>'+
                '</tr>');


        });
      },
      error: function(error) {
            alert("Hubo un error de red, Recarga la Pagina!");
            location.reload();
        }
      });
}





$( document ).ready(function() {
  $("#saldo_gois").empty();
  $("#saldo_gois").append("Saldo (Gois): ${{$user->saldo}} <i class='fas fa-coins'></i> ");
  get_transacctions('{{$user->wallet}}');
});
</script>

@endsection
