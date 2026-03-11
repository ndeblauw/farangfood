<?php

namespace App\Http\Controllers;

class ShopController extends Controller
{
    public function index()
    {
        $shops = cache()->remember('shops_index', 60, function () {
            sleep(4); // simulate a long query

            return \App\Models\Shop::query()
                ->select('id', 'name')
                ->orderBy('name')
                ->with('foods', 'reviews') // avoid N+1 problem
                ->where('is_published', true)
                ->get();
        });

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
