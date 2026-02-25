<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = [
            'Ponny',
            'KFC',
            'Starbucks',
        ];

        return view('shops.index', ['shops' => $shops]);
    }

    public function show($shop)
    {
        return view('shops.show', ['shop' => $shop]);
    }
}
