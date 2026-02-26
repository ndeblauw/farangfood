<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = \App\Models\Shop::orderBy('name')->get();

        return view('shops.index', ['shops' => $shops]);
    }

    public function show($id)
    {
        $shop = \App\Models\Shop::where('id', $id)->first();

        return view('shops.show', ['shop' => $shop]);
    }
}
