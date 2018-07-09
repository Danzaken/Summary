<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\User;
use App\Trucking;
use App\Transport;
use DB;
use App\Accommodation;

class SearchController extends Controller
{
    public function travels(Request $request){
        
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
       
        if($request){
            $drivers = Driver::all()->where('location', $request->location)->where('route', $request->route)->where('data', $request->data);
           $user = [];
            foreach($drivers as $k=>$driver){
                $user[$k] = $driver->user_id;
           }  
        }
        return view('site.search',[
            'title'=>'Поиск поездки',
            'header_banner'=>$header_banner,
            'drivers'=> $drivers,
            'side_bar_banner'=>$side_bar_banner     
            
        ]);
    }
    public function truckings(Request $request){
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        if($request){
        	if(isset($request->sorting)){
        		$sorting = explode(' ', $request->sorting);
        	}
        	else{
        		$sorting = array('created_at', 'desc');
        	}
        	if($request->foto === "on"){
        		$foto = "";
        	}
        	else{
        		$foto = "NULL";
        	}
        	$trucking = DB::table('truckings')->where('location', $request->location)->where('route', $request->route)->where('data', $request->data)->where('foto', '<>', $foto)->orderBy($sorting[0], $sorting[1])->paginate(15);

             return view('site.search2',[
                'title'=>'Поиск грузоперевозки',
                'header_banner'=>$header_banner,
                'truckings'=>$trucking,
                'side_bar_banner'=>$side_bar_banner,
                'request'=>$request
             ]);
        }
    }
    public function transport(Request $request){
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        if($request){    
        	if(isset($request->sorting)){
        		$sorting = explode(' ', $request->sorting);
        	}
        	else{
        		$sorting = array('created_at', 'desc');
        	}        	
        	if($request->foto === "on"){
        		$foto = "";
        	}
        	else{
        		$foto = "NULL";
        	}
        	if($request->location == ""){
        		$transport = DB::table('transports')->where('foto', '<>', $foto)->orderBy($sorting[0], $sorting[1])->paginate(15);
        	}
        	else{
             	$transport = DB::table('transports')->where('foto', '<>', $foto)->where('path', $request->location)->orderBy($sorting[0], $sorting[1])->paginate(15);
        	}
           
             return view('site.search3',[
                'title'=>'Поиск автобусов',
                'header_banner'=>$header_banner,
                'transports'=>$transport,
                'side_bar_banner'=>$side_bar_banner
             ]);
        }
    }
    public function accommodation(Request $request){
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        //dd($request);
        
        if($request->isMethod('post')){
            if($request->appartament == 'apartment'){
                $appartament = 'квартир';
                if($request->city){
                $accommodations = Accommodation::where('appartament', 'apartment')->where('city', $request->city)->paginate(9);
                if($request->number_rooms){
                    $accommodations = Accommodation::where('appartament', 'apartment')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->paginate(9);
                }
                if($request->price_from){
                    $accommodations = Accommodation::where('appartament', 'apartment')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->paginate(9);
                    if($request->price_up_to){
                        $accommodations = Accommodation::where('appartament', 'apartment')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->where('price', '<', $request->price_up_to)->paginate(9);
                    }
                }
        
            }
            }
            if($request->appartament == 'house'){
                $appartament = 'домов';
                if($request->city){
                    $accommodations = Accommodation::where('appartament', 'house')->where('city', $request->city)->paginate(9);
                    if($request->number_rooms){
                        $accommodations = Accommodation::where('appartament', 'house')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->paginate(9);
                    }
                    if($request->price_from){
                        $accommodations = Accommodation::where('appartament', 'house')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->paginate(9);
                        if($request->price_up_to){
                            $accommodations = Accommodation::where('appartament', 'house')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->where('price', '<', $request->price_up_to)->paginate(9);
                        }
                    }
            
                }
            }
            if($request->appartament == 'hostel'){
                $appartament = 'хостелов';
                if($request->city){
                    $accommodations = Accommodation::where('appartament', 'hostel')->where('city', $request->city)->paginate(9);
                    if($request->number_rooms){
                        $accommodations = Accommodation::where('appartament', 'hostel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->paginate(9);
                    }
                    if($request->price_from){
                        $accommodations = Accommodation::where('appartament', 'hostel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->paginate(9);
                        if($request->price_up_to){
                            $accommodations = Accommodation::where('appartament', 'hostel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->where('price', '<', $request->price_up_to)->paginate(9);
                        }
                    }
            
                }
            }
            if($request->appartament == 'hotel'){
                $appartament = 'отелей';
                if($request->city){
                    $accommodations = Accommodation::where('appartament', 'hotel')->where('city', $request->city)->paginate(9);
                    if($request->number_rooms){
                        $accommodations = Accommodation::where('appartament', 'hotel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->paginate(9);
                    }
                    if($request->price_from){
                        $accommodations = Accommodation::where('appartament', 'hotel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->paginate(9);
                        if($request->price_up_to){
                            $accommodations = Accommodation::where('appartament', 'hotel')->where('city', $request->city)->where('number_rooms', $request->number_rooms)->where('price', '>', $request->price_from)->where('price', '<', $request->price_up_to)->paginate(9);
                        }
                    }
            
                }
            }
            
            
            return view('site.accommodations_search_all',[
                'header_banner'=>$header_banner,
                'accommodations'=>$accommodations,
                'side_bar_banner'=>$side_bar_banner,
                'title'=>'Поиск жилья',
                'appartament'=>$appartament
            ]);
        }
    }
}
