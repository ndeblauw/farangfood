<?php

namespace App\Http\Controllers;

use App\Models\ReviewVote;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(): View
    {
        $shops = \App\Models\Shop::where('is_published', true)->orderBy('name')->get();

        return view('shops.index', ['shops' => $shops]);
    }

    public function show(int $id): View
    {
        $shop = \App\Models\Shop::where('id', $id)->with('foods')->first();

        if ($shop->is_published === false) {
            abort(404);
        }

        $reviews = $shop->reviews()
            ->with('author')
            ->withCount([
                'votes as likes_count' => fn ($query) => $query->where('vote_type', 1),
                'votes as dislikes_count' => fn ($query) => $query->where('vote_type', -1),
            ])
            ->withSum('votes as score', 'vote_type')
            ->orderByRaw('COALESCE(score, 0) DESC')
            ->orderByDesc('created_at')
            ->get();

        $shop->setRelation('reviews', $reviews);

        $userVotes = [];

        if (auth()->check() && $reviews->isNotEmpty()) {
            $userVotes = ReviewVote::where('user_id', auth()->id())
                ->whereIn('review_id', $reviews->pluck('id'))
                ->pluck('vote_type', 'review_id')
                ->all();
        }

        return view('shops.show', ['shop' => $shop, 'userVotes' => $userVotes]);
    }
}
