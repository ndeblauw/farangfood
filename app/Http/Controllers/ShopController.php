<?php

namespace App\Http\Controllers;

class ShopController extends Controller
{
    public function index()
    {
        $shops = \App\Models\Shop::where('is_published', true)->orderBy('name')->get();

        return view('shops.index', ['shops' => $shops]);
    }

    public function show($id)
    {
        $shop = \App\Models\Shop::where('id', $id)->first(); // 1 query
        $shop->load('foods', 'reviews', 'reviews.author:id,name'); // 3 more to catch the N+1 problem

        if ($shop->is_published === false) {
            abort(404);
        }

        return view('shops.show', ['shop' => $shop]);
    }
}
