<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewReaction;
use Illuminate\Http\RedirectResponse;

class ReviewReactionController extends Controller
{
    public function like(Review $review): RedirectResponse
    {
        return $this->setReaction($review, 'like');
    }

    public function dislike(Review $review): RedirectResponse
    {
        return $this->setReaction($review, 'dislike');
    }

    public function remove(Review $review): RedirectResponse
    {
        ReviewReaction::where('review_id', $review->id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->back();
    }

    private function setReaction(Review $review, string $reactionType): RedirectResponse
    {
        ReviewReaction::updateOrCreate(
            [
                'review_id' => $review->id,
                'user_id' => auth()->id(),
            ],
            [
                'reaction_type' => $reactionType,
            ]
        );

        return redirect()->back();
    }
}
