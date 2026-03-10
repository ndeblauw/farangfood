<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewLike;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReviewLikeController extends Controller
{
    public function store(Request $request, Review $review): JsonResponse|RedirectResponse
    {
        $review->loadMissing('shop');

        if (! $review->shop || ! $review->shop->is_published) {
            abort(404);
        }

        $like = ReviewLike::firstOrCreate([
            'user_id' => $request->user()->id,
            'review_id' => $review->id,
        ]);

        $payload = [
            'message' => 'Review liked successfully.',
            'liked' => true,
            'like_count' => $review->likes()->count(),
            'review_like_id' => $like->id,
        ];

        if ($request->expectsJson()) {
            return response()->json($payload);
        }

        return redirect()->back();
    }

    public function destroy(Request $request, Review $review): JsonResponse|RedirectResponse
    {
        $review->loadMissing('shop');

        if (! $review->shop || ! $review->shop->is_published) {
            abort(404);
        }

        ReviewLike::where('review_id', $review->id)
            ->where('user_id', $request->user()->id)
            ->delete();

        $payload = [
            'message' => 'Review unliked successfully.',
            'liked' => false,
            'like_count' => $review->likes()->count(),
        ];

        if ($request->expectsJson()) {
            return response()->json($payload);
        }

        return redirect()->back();
    }
}
