<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function add_currency()
    {
        return view('addCurrency');
    }
    public function store_currency(Request $request)
    {
        $post = new Currency;
        $post->currency_name = $request->CurenncyName;
        $post->is_defualt = 0;
        $post->rate = $request->defualt_value;
         $post->save();
        return redirect('/')->with('status', 'Currency Post Form Data Has Been inserted');
    }
}
