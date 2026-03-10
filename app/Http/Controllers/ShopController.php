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
        $shop = \App\Models\Shop::with([
            'foods',
            'reviews' => function ($query) {
                $query->with(['author', 'likes'])
                    ->withCount('likes')
                    ->latest();
            },
        ])->where('id', $id)->firstOrFail();

        if ($shop->is_published === false) {
            abort(404);
        }

        return view('shops.show', ['shop' => $shop]);
    }
}
