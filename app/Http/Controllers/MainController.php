<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MainController extends Controller
{
  public function multilogin(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
        // 1.- se registra
       $stat =  User::create([
              'name' => $request->name,
              'email' => $request->email,
              'wallet' => $request->wallet,
              'saldo' => $request->saldo,
              'password' => Hash::make($request->nick_pass),
          ]);
          $user = DB::table('users')->where("email",$request->email)->first();
          $mem = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->first();
          return view('home')->with('user',$user)->with('mem',$mem);
      }else{
        $mem = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->first();
        return view('home')->with('user',$user)->with('mem',$mem);
      }
  }


  public function catalogo_membresias(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          return view('catalogo_membresias')->with('user',$user);
        }
  }


  public function cambio_contrasena(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          return view('cambio_contrasena')->with('user',$user);
        }
  }







  public function kyc(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          return view('kyc')->with('user',$user);
        }
  }



  public function mis_membresias(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          $mem = DB::table('membresias_usuarios')->where("user_id",$user->id)->get();
          $pm = DB::table('pagos_mensuales')->where("user_id",$user->id)->get();

          $pm_estandar_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","estandar")->get();
          $pm_premium_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","premium")->get();
          $pm_elite_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","elite")
          ->where('plan', 'like', '%Plan 12%')->get();
          $pm_elite_quiero_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","elite")
          ->where('plan', 'like', '%12 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_elite_quiero_6 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","elite")
          ->where('plan', 'like', '%6 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_elite_150_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","elite")
          ->where('plan', 'like', '%Plan 150%')->get();
          $pm_gold_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","gold")
          ->where('plan', 'like', '%Plan 12%')->get();
          $pm_gold_quiero_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","gold")
          ->where('plan', 'like', '%12 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_gold_quiero_6 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","gold")
          ->where('plan', 'like', '%6 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_gold_150_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","gold")
          ->where('plan', 'like', '%Plan 150%')->get();
          $pm_empresarial_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","empresarial")
          ->where('plan', 'like', '%Plan 12%')->get();
          $pm_empresarial_quiero_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","empresarial")
          ->where('plan', 'like', '%12 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_empresarial_quiero_6 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","empresarial")
          ->where('plan', 'like', '%6 Meses%')->where('plan', 'like', '%Quiero%')->get();
          $pm_empresarial_150_12 = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","empresarial")
          ->where('plan', 'like', '%Plan 150%')->get();

          //dd($mem,$pm);
          return view('mis_membresias')->with('user',$user)->with("pm_premium_12",$pm_premium_12)->with('pm_elite_150_12',$pm_elite_150_12)
          ->with("pm_gold_quiero_6",$pm_gold_quiero_6)->with("pm_gold_150_12",$pm_gold_150_12)->with("pm_empresarial_12",$pm_empresarial_12)
          ->with("pm_empresarial_quiero_12",$pm_empresarial_quiero_12)->with("pm_empresarial_quiero_6",$pm_empresarial_quiero_6)
          ->with("pm_empresarial_150_12",$pm_empresarial_150_12)->with("pm_estandar_12",$pm_estandar_12)->with("pm_elite_12",$pm_elite_12)
          ->with("pm_elite_quiero_12",$pm_elite_quiero_12)
          ->with("pm_gold_12",$pm_gold_12)->with("pm_elite_quiero_6",$pm_elite_quiero_6)->with("pm_gold_quiero_12",$pm_gold_quiero_12)
          ->with('mem',$mem)->with('pm',$pm);
        }
  }



  public function mis_pagos_mensuales(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          $pm = DB::table('pagos_mensuales')->where("user_id",$user->id)->get();
          return view('mis_pagos_mensuales')->with('user',$user)->with('pm',$pm);
        }
  }




  public function mis_transacciones(Request $request)
  {
      $user = Auth::user();
      if($user == null){
          return view('no_autorizado');
        }else{
          $mem_count = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->get();
          return view('mis_transacciones')->with('user',$user)->with('mem_count',$mem_count);
        }
  }





  public function comprar_membresia(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          return view('comprar')->with('user',$user)->with('membresia',$request->membresia)
          ->with('cantidad',$request->cantidad)
          ->with('plan',$request->plan);
        }
  }


  public function comprar_inversion(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();
      if($user == null){
          return view('no_autorizado');
        }else{
          if($user->saldo < $request->cantidad){ return view('sin_saldo'); }

          return view('comprar_inversion')->with('user',$user)->with('membresia',$request->membresia)
          ->with('cantidad',$request->cantidad)->with('info',$request->info)->with('plan',$request->plan)
          ->with('duracion',$request->duracion);
        }
  }



  public function procesar_pago_inversion(Request $request)
  {
      $user = Auth::user();
      if($user == null){
          return view('no_autorizado');
        }else{
          if($user->saldo < $request->cantidad){ return view('sin_saldo'); }
          //aqui validamos que no tenga ya una membresia
          $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia",$request->membresia)->get();

          //dd("aqui",count($check_inv),$request->membresia);
          if(count($check_inv) > 0){
            // Validacion de Inversion para saber cuales tiene en cual membresia
            if($request->membresia == "elite"){
              //dd();
              $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
              ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan Quiero%')->get();
                        if(count($check_inv) > 0){
                          $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
                          ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan 150%')->get();
                          //dd($check_inv);
                          if(count($check_inv) > 0){
                            return view('error_sobremembresia');
                          }
                        }
            }

            if($request->membresia == "gold"){
              //dd("plus");
                $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
                ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan Quiero%')->get();
                          if(count($check_inv) > 0){
                            $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
                            ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan 150%')->get();
                            if(count($check_inv) > 0){
                            return view('error_sobremembresia');
                            }
                          }
              }


              if($request->membresia == "empresarial"){
                //dd("plus");
                  $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
                  ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan Quiero%')->get();
                            if(count($check_inv) > 0){
                              $check_inv = DB::table('pagos_mensuales')->where("user_id",$user->id)
                              ->where("membresia",$request->membresia)->where('plan', 'like', '%Plan 150%')->get();
                              if(count($check_inv) > 0){
                              return view('error_sobremembresia');
                              }
                            }
                }

          }


          $update_bal = DB::table('users')
           ->where('id', $user->id)
           ->update(['saldo' => $user->saldo - $request->cantidad ]);
          // Realizamos el pago de cryptocoin
          $dura = 0; $st = 'pagado'; $dat = Carbon::now(); $tatu = 0;
          // Realizamos el pool de pagos en base de datos y se paga el primero al momento

          if($request->duracion == '12 Meses' || $request->duracion == '12 meses'){ $dura = 12; }
          if($request->duracion == '6 Meses'  || $request->duracion == '6 meses'){ $dura = 6; }
          for($i=1;$i<=$dura;$i++){
            if($i >1){ $st = 'pendiente'; $dat = Carbon::now()->addMonths($i); $tatu = 1; }
            // Agregamos registros en base de datos
            $stat = DB::table('pagos_mensuales')->insert([
                          'user_id' => $user->id,
                          'membresia' => $request->membresia,
                          'plan' => $request->plan.' '.$request->duracion,
                          'cantidad' => $request->cantidad,
                          'pago_id' => $i,
                          'tipo_pago' => 'goicoin',
                          'fecha_liberacion' => $dat,
                          'status' => $tatu
                      ]);
          }

return redirect('/home');

        }
  }

  public function procesar_pago_cryptocoin(Request $request)
  {
      $user = DB::table('users')->where("email",$request->email)->first();

      if($user == null){
          return view('no_autorizado');
        }else{
          // Validacion de saldo suficiente para compra
          if($user->saldo < $request->cantidad){ return view('sin_saldo'); }
          //aqui validamos que no tenga ya una membresia
          $check_membresia = DB::table('membresias_usuarios')->where("user_id",$user->id)->where("membresia",$request->membresia)->first();
          if($check_membresia){
            return view('error_sobremembresia');
          }
          //$m = json_decode($this->hacer_cargo_cryptocoin($user->wallet,$request->cantidad));
          //if($m->message == 'Success!! The transacction has been complete.')
          if('Success!! The transacction has been complete.' == 'Success!! The transacction has been complete.'){

            $update_bal = DB::table('users')
             ->where('id', $user->id)
             ->update(['saldo' => $user->saldo - $request->cantidad ]);

            $stat = DB::table('membresias_usuarios')->insert([
                          'user_id' => $user->id,
                          'membresia' => $request->membresia,
                          'plan' => $request->plan,
                          'cantidad' => $request->cantidad,
                          'status' => 1
                      ]);




            return redirect('/home');
          }else{
              return view('no_autorizado');
          }
        }
  }



public function hacer_cargo_cryptocoin($wallet,$amount){
  $recep = json_decode($this->open_wallet());
  $certificate_location = '/cacert.pem';
  $data2 = [  'api_key' => 'M4ST3RK3Y00000001', 'wallet' => $wallet , 'amount' => $amount, 'recipient' => $recep->wallet, 'service' => 'send'];
                              $curl = curl_init();
                              curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://www.goicoindeveloper.com/api/service_send',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30000,
                                CURLOPT_SSL_VERIFYHOST => $certificate_location,
                                CURLOPT_SSL_VERIFYPEER => $certificate_location,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => json_encode($data2),
                                CURLOPT_HTTPHEADER => array(
                                  // Set here requred headers
                                    "accept: */*",
                                    "accept-language: en-US,en;q=0.8",
                                    "content-type: application/json",
                                ),
                              ));
                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);
                              return $response;
}




public function open_wallet(){
  $data2 = [  'api_key' => 'M4ST3RK3Y00000001'];
                              $curl = curl_init();
                              $certificate_location = '/cacert.pem';
                              curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://www.goicoindeveloper.com/api/open_wallet',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_SSL_VERIFYHOST => $certificate_location,
                                CURLOPT_SSL_VERIFYPEER => $certificate_location,
                                CURLOPT_TIMEOUT => 30000,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => json_encode($data2),
                                CURLOPT_HTTPHEADER => array(
                                  // Set here requred headers
                                    "accept: */*",
                                    "accept-language: en-US,en;q=0.8",
                                    "content-type: application/json",
                                ),
                              ));
                              $response = curl_exec($curl);

                              $err = curl_error($curl);

                              curl_close($curl);
                              return $response;
}





public function pin_update(Request $request)
{
  $data2 = [  'api_key' => 'M4ST3RK3Y00000001','email' => $request->email, 'pin' => $request->pin];
                              $curl = curl_init();
                              $certificate_location = '/cacert.pem';
                              curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://www.goicoindeveloper.com/api/actualizar_pin',
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_SSL_VERIFYHOST => $certificate_location,
                                CURLOPT_SSL_VERIFYPEER => $certificate_location,
                                CURLOPT_TIMEOUT => 30000,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => json_encode($data2),
                                CURLOPT_HTTPHEADER => array(
                                  // Set here requred headers
                                    "accept: */*",
                                    "accept-language: en-US,en;q=0.8",
                                    "content-type: application/json",
                                ),
                              ));
                              $response = curl_exec($curl);

                              $err = curl_error($curl);

                              curl_close($curl);
                              $m = json_decode($response);

                              if($m->state == 1){
                                $user = DB::table('users')->where("email",$request->email)->first();
                                $mem = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->first();
                                return view('home')->with('user',$user)->with('mem',$mem);
                              }
                              if($m->state == 0){
                                return view('no_autorizado');
                              }
                              return view('no_autorizado');

                            }

}
