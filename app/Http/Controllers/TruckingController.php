<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trucking;
use DB;

class TruckingController extends Controller
{
    public function execute(){
      
        $truckings = DB::table('truckings')->limit(3)->get();      
        $location = DB::table('truckings')->pluck('location');
        $route = DB::table('truckings')->pluck('route');
   
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        return view('site.trucking_index',[
            'truckings'=>$truckings,
            'title'=>'Грузоперевозки',
            'header_banner'=>$header_banner,
            'side_bar_banner'=>$side_bar_banner,
            'route'=>$route,
            'location'=>$location
        ]);
    }

    public function all(){
        $truckings = Trucking::paginate(9);
        $truckings_all = Trucking::all();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        return view('site.search2', [
            'title'=>'Все грузоперевозки',
            'truckings'=>$truckings,
            'truckings_all'=>$truckings_all,
            'header_banner'=>$header_banner,
            'side_bar_banner'=>$side_bar_banner
        ]);
    }
}
