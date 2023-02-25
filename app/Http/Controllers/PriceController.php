<?php

namespace App\Http\Controllers;
use App\Models\Projects;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Price;

class PriceController extends Controller
{
    public function curency_conventer()
    {
        $items = Currency::pluck('currency_name', 'id');
        $selectedID = 2;
        $result=0;
        return view('currencyconverter',compact('selectedID', 'items','result'));
    }
    public function currency_converter_result(Request $request)
    {
        $from_currency=$request->currency_id_from;
         $to_currency=$request->currency_id_to;
         $get_defualt_value_to_first_curr=Currency::where('id',$from_currency);
          $get_defualt_value_to_second_curr=Currency::where('id',$to_currency)->get();
          $val=$get_defualt_value_to_second_curr[0]->rate;
          $result=intval($val) * $request->curr_value;
         $items = Currency::pluck('currency_name', 'id');
         $selectedID = 2;

        return view('currencyconverter',compact('result','selectedID', 'items'));
    }

    public function get_final_price(Request $request)
    {
        $get_all_prices=Price::where('project_id',$request->project_id);
         $count=0;
        // foreach($get_all_prices as $price){
        //     if(price->currency_id=='1'){
        //         $count=$count + intval($price->price);
        //     }
        //     else{
        //       $value_in_defult_curr= Currency::where('id',$request->currency_id)->get();
        //       $val=$value_in_defult_curr->rate * intval($price->price); 
        //       $count=$count+$val;
        //     };
        // };
        return view('currencyconverter',compact('count'));
    }
    public function get_all_projects()
    {
        $get_all_projects=Projects::get();

       
        return view('getAllProjects',compact('get_all_projects'));
    }
    public function project_final_price(Request $request,$id)
    {
        $items = Currency::pluck('currency_name', 'id');
        $selectedID = 2;
        $project = Projects::where('id',$id )->first();
        $prices=Price::where('project_id',$project->id)->get();
       $count=0;
        foreach($prices as $price){
            if($price->currency_id=='1'){
                $count=$count + intval($price->price);
            }
            else{
              $value_in_defult_curr= Currency::where('id',$prices[0]->currency_id)->get();
              $val=$value_in_defult_curr[0]->rate * intval($price->price); 
            $count=$count+$val;
            };
        };
        return view('projectFinalPrice',compact('project','count','items','selectedID'));
    }
    public function final_price(Request $request)
    {
        $items = Currency::pluck('currency_name', 'id');
        $selectedID = 2;
        $project = Projects::where('id',$request->project_id )->first();
        $currency = Currency::where('id',$request->currency_id_to )->first();   
        $rate=$currency->rate;
        $other_price=$rate * $request->final_price_defualt;
        $prices=Price::where('project_id',$project->id)->get();
        $count=0;
         foreach($prices as $price){
             if($price->currency_id=='1'){
                 $count=$count + intval($price->price);
             }
             else{
               $value_in_defult_curr= Currency::where('id',$prices[0]->currency_id)->get();
               $val=$value_in_defult_curr[0]->rate * intval($price->price); 
             $count=$count+$val;
             };
         };
        return view('projectFinalPrice',compact('project','count','items','selectedID','other_price'));
    }
    
}
