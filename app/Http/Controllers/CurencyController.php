<?php

namespace App\Http\Controllers;

use App\Currency;
use DateTime;
use Illuminate\Http\Request;


class CurencyController extends Controller
{
    public function parse1(Request $request){
        $d=date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
        $i1=$d;
        while($i1!=date('Y-m-d',strtotime(date('Y-m-d') .' +1 day'))){
            $date1 = new DateTime($i1);
            $url = Currency::$URL.date_format($date1,'d/m/Y');
            $xml = simplexml_load_file($url);
            $insert_date = date("Y-m-d", strtotime($xml['Date']));
            $check = Currency::where('date', '=', $insert_date)->get()->count();
            if(!empty($xml) && date("d/m/Y", strtotime($xml['Date'])) == date_format($date1,'d/m/Y') && $check==0){
                $count = $xml->count();
                for ($i=0; $i<$count; $i++){
                    Currency::insert([
                        'valuteID'=>$xml->Valute[$i]['ID'],
                        'numCode'=>$xml->Valute[$i]->NumCode,
                        'charCode'=>$xml->Valute[$i]->CharCode,
                        'name'=>$xml->Valute[$i]->Name,
                        'value'=>$xml->Valute[$i]->Value,
                        'date'=>$insert_date,
                    ]);
                }
            }
            $i1 =date("Y-m-d", strtotime($i1 .' +1 day')) ;
        }
        return redirect()->back()->with('success', "Currency data inserted to DB successfully!");
    }


    public function parse2(Request $request){
        $d=date('d/m/Y');
        print_r($d);
            $url = Currency::$URL.$d;
            $xml = simplexml_load_file($url);
           dd($xml);
            $insert_date = date("Y-m-d", strtotime($xml['Date']));
            $check = Currency::where('date', '=', $insert_date)->get()->count();
            if(!empty($xml) && date("d/m/Y", strtotime($xml['Date'])) == $d && $check==0){
                $count = $xml->count();
                for ($i=0; $i<$count; $i++){
                    Currency::insert([
                        'valuteID'=>$xml->Valute[$i]['ID'],
                        'numCode'=>$xml->Valute[$i]->NumCode,
                        'charCode'=>$xml->Valute[$i]->CharCode,
                        'name'=>$xml->Valute[$i]->Name,
                        'value'=>$xml->Valute[$i]->Value,
                        'date'=>$insert_date,
                    ]);
                }
            }


        return redirect()->back()->with('success', "Currency data inserted to DB successfully!");
    }


}
