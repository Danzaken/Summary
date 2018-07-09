<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Trucking;
use App\User;
use App\Transport;
use App\Accommodation;
use DB;
use Auth;
use App\Companion;
class DetalsController extends Controller
{
    public function bus($id){
        
        $detals = Transport::all()->where('id', $id)->first();
        if(!Auth::user()){
            $user_auth = 0;
        }else{
            $user_auth = Auth::user()->id;
        }
        $name = User::all()->where('email', $detals->email)->first();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        $transports = DB::table('transports')->limit(3)->get();
        return view('detals.bus_index',[
            'title'=>$detals->name,
            'header_banner'=>$header_banner,
            'detals'=>$detals,
            'name'=>$name,
            'transports'=>$transports,
            'side_bar_banner'=>$side_bar_banner,
            'user_auth'=>$user_auth
        ]);
    }

    public function truck($id){
        $detals = Trucking::all()->where('id', $id)->first();
        if(!Auth::user()){
            $user_auth = 0;
        }else{
            $user_auth = Auth::user()->id;
        }
        
        $name = User::all()->where('email', $detals->email)->first();
        $truckings = DB::table('truckings')->limit(3)->get();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        return view('detals.truck_index',[
            'title'=>$detals->avto,
            'header_banner'=>$header_banner,
            'detals'=>$detals,
            'name'=>$name,
            'truckings'=>$truckings,
            'side_bar_banner'=>$side_bar_banner,
            'user_auth'=>$user_auth
        ]);
    }

    public function apartment($id){
        $detals = Accommodation::all()->where('id', $id)->first();
        if(!Auth::user()){
            $user_auth = 0;
        }else{
            $user_auth = Auth::user()->id;
        }
        $accommodations = DB::table('accommodations')->limit(3)->get();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');
        return view('detals.apartment_index', [
            
            'title'=>$detals->city. ", ". $detals->location,
            'header_banner'=>$header_banner,
            'detals'=>$detals,
            'accommodations'=>$accommodations,
            'side_bar_banner'=>$side_bar_banner,
            'user_auth'=>$user_auth
            
        ]);
    }

    public function companion($id){
     
        $detals = Companion::all()->where('id', $id)->first();
        //dd($detals);
        //$detals = Accommodation::all()->where('id', $id)->first();
        if(!Auth::user()){
            $user_auth = 0;
        }else{
            $user_auth = Auth::user()->id;
        }
        $accommodations = DB::table('accommodations')->limit(3)->get();
        $header_banner = DB::table('services')->where('id', 1)->value('text');
        $side_bar_banner = DB::table('services')->where('id', 2)->value('text');

        //dd($detals);
        return view('detals.companion_index',[
            'title'=>$detals->name,
            'header_banner'=>$header_banner,
            'side_bar_banner'=>$side_bar_banner,
            'profile'=>$detals
        ]);
    }
    public function travel($id){
        $travel = DB::table('travels')->where('id', $id)->first();
        if($travel){
        	$driver = DB::table('drivers')->where('id', $travel->driver_id)->first();
	        $driver->short_name = mb_substr($driver->name, 0, mb_strpos($driver->name, " ") + 2) . ".";
	        $driver->age = Carbon::parse($driver->birthday)->diffInYears(Carbon::now());
	        $companions = DB::table('travel_companion')->where('travel_id', $id)->join('profiles', 'travel_companion.companion_id', '=', 'profiles.id')->get();
	        $travel->taken_seats = $companions->count();
	        $companions->each(function ($item, $key){
	        	$item->short_name = $item->first_name . " " . mb_substr($item->last_name, 1) . ".";
	        	$item->age = Carbon::parse($item->data_birth)->diffInYears(Carbon::now());
	        });

	        if(!Auth::user()){
	            $user_auth = 0;
	        }else{
	            $user_auth = Auth::user()->id;
	        }
	        $header_banner = DB::table('services')->where('id', 1)->value('text');
	        return view('detals.travel_index',[
	            'title'=>$travel->location . " - " . $travel->route,
	            'header_banner'=>$header_banner,
	            'travel'=>$travel,
	            'driver'=>$driver,
	            'companions'=>$companions,
	        ]);
        }
        else{
        	Route::get('dashboard', function () {
			  return redirect('/');
			});
        }
        
    }
}
