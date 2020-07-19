<?php

namespace App\Http\Controllers;


use App\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CountryController extends Controller
{
    public function country($valute_id,$from,$to){
        $date1 = date("Y-m-d", strtotime($from));
        $date2 = date("Y-m-d", strtotime($to));
        $country = Currency::where('valuteID', $valute_id)
            ->whereBetween('date', [$date1, $date2])
            ->get();
        return response()->json($country,200);
    }

    public function get_country(){
        $currency= Currency::orderBy('date' , 'DESC')->paginate(34)
         ;

        return view('currency',compact('currency'));

    }


}
