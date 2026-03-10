<?php

namespace App\Http\Controllers;

use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::query()->where('is_published', true)->orderBy('name')->get();

        return view('shops.index', ['shops' => $shops]);
    }

    public function show($id)
    {
        $shop = Shop::query()->with([
            'foods',
            'reviews' => function ($query) {
                $query->with('author')
                    ->withCount('likes')
                    ->latest();

                if (auth()->check()) {
                    $query->withExists([
                        'likes as liked_by_current_user' => fn ($likeQuery) => $likeQuery->where('user_id', auth()->id()),
                    ]);
                }
            },
        ])->findOrFail($id);

        if ($shop->is_published === false) {
            abort(404);
        }

        return view('shops.show', ['shop' => $shop]);
    }
}
