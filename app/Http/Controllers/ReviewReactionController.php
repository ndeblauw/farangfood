<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewReaction;

class ReviewReactionController extends Controller
{
    public function like(Review $review)
    {
        return $this->setReaction($review, 'like');
    }

    public function dislike(Review $review)
    {
        return $this->setReaction($review, 'dislike');
    }

    public function remove(Review $review)
    {
        ReviewReaction::where('review_id', $review->id)
            ->where('user_id', auth()->id())
            ->delete();

        return redirect()->back();
    }

    private function setReaction(Review $review, string $reactionType)
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
