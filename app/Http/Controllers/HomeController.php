<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
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
            $mem_count = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->get();
            return view('home')->with('user',$user)->with('mem',$mem)->with('mem_count',$mem_count)->with('count',1);
        }else{
          $mem = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->first();
          $mem_count = DB::table('membresias_usuarios')->where("user_id",$user->id)->latest('id')->get();
          return view('home')->with('user',$user)->with('mem',$mem)->with('mem_count',$mem_count)->with('count',1);;
        }

    }

    public function detalle_inversion(Request $request)
    {
      //dd($request->ide);
      $user = Auth::user();
      $inversion = null;
      if($request->ide = "pm_estandar_12"){
          $inversion = DB::table('pagos_mensuales')->where("user_id",$user->id)->where("membresia","estandar")->get();
      }
        return view('detalle_inversion')->with('inversion',$inversion)->with('user',$user);
    }


}
