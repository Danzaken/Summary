<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;
use DB;

class TransportController extends Controller
{
   public function execute(){
        $transports=DB::table('transports')->limit(3)->get();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');        
        $path = Transport::groupBy('path')->get();

       return view('site.transport_index',[
            'transports'=>$transports,
            'header_banner'=>$header_banner,
            'title'=>'Аренда транспорта',
            'side_bar_banner'=>$side_bar_banner,
            'path'=> $path
       ]);
   }

   public function all(){
       $transports = Transport::paginate(4);
       $transports_all = Transport::all();
       $header_banner = DB::table('services')->where('id', 1)->value('text');
       $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
       return view('site.search3', [
           'title'=>'Весь транспорт',
           'header_banner'=>$header_banner,
           'transports'=>$transports,
           'transports_all'=>$transports_all,
           'side_bar_banner'=>$side_bar_banner
       ]);
   }
}
