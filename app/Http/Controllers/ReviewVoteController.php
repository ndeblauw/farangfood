<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewVote;
use Illuminate\Http\Request;

class ReviewVoteController extends Controller
{
    public function store(Request $request, Review $review)
    {
        $validated = $request->validate([
            'vote_type' => ['required', 'integer', 'in:-1,1'],
        ]);

        ReviewVote::updateOrCreate(
            [
                'review_id' => $review->id,
                'user_id' => $request->user()->id,
            ],
            [
                'vote_type' => $validated['vote_type'],
            ]
        );

        return back();
    }

    public function destroy(Request $request, Review $review)
    {
        ReviewVote::where('review_id', $review->id)
            ->where('user_id', $request->user()->id)
            ->delete();

        return back();
    }
}
