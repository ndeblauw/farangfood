<?php

use App\Models\Review;
use App\Models\ReviewReaction;
use App\Models\Shop;
use App\Models\User;

function createReviewForReactions(): Review
{
    $author = User::factory()->create();

    return Review::factory()
        ->for($author, 'author')
        ->for(Shop::factory()->state(['author_id' => $author->id]), 'shop')
        ->create();
}

it('requires authentication to react to a review', function () {
    $review = createReviewForReactions();

    $this->post(route('reviews.like', $review))
        ->assertRedirect(route('login'));

    $this->post(route('reviews.dislike', $review))
        ->assertRedirect(route('login'));

    $this->delete(route('reviews.reaction.remove', $review))
        ->assertRedirect(route('login'));
});

it('allows a user to like and dislike a review', function () {
    $user = User::factory()->create();
    $review = createReviewForReactions();

    $this->actingAs($user)
        ->post(route('reviews.like', $review))
        ->assertRedirect();

    $this->assertDatabaseHas('review_reactions', [
        'user_id' => $user->id,
        'review_id' => $review->id,
        'reaction_type' => 'like',
    ]);

    $this->actingAs($user)
        ->post(route('reviews.dislike', $review))
        ->assertRedirect();

    $this->assertDatabaseHas('review_reactions', [
        'user_id' => $user->id,
        'review_id' => $review->id,
        'reaction_type' => 'dislike',
    ]);
});

it('keeps only one reaction per user per review', function () {
    $user = User::factory()->create();
    $review = createReviewForReactions();

    $this->actingAs($user)->post(route('reviews.like', $review));
    $this->actingAs($user)->post(route('reviews.like', $review));

    expect(ReviewReaction::query()
        ->where('user_id', $user->id)
        ->where('review_id', $review->id)
        ->count())->toBe(1);
});

it('allows a user to remove their reaction', function () {
    $user = User::factory()->create();
    $review = createReviewForReactions();

    ReviewReaction::factory()
        ->for($user)
        ->for($review)
        ->create([
            'reaction_type' => 'like',
        ]);

    $this->actingAs($user)
        ->delete(route('reviews.reaction.remove', $review))
        ->assertRedirect();

    $this->assertDatabaseMissing('review_reactions', [
        'user_id' => $user->id,
        'review_id' => $review->id,
    ]);
});
