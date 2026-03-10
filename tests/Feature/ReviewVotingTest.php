<?php

use App\Models\Review;
use App\Models\ReviewVote;
use App\Models\Shop;
use App\Models\User;

it('allows a user to vote once per review, switch vote type, and remove vote', function () {
    $author = User::factory()->create();
    $voter = User::factory()->create();
    $reviewer = User::factory()->create();

    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);

    $review = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $reviewer->id,
    ]);

    $this->actingAs($voter)
        ->post(route('reviews.vote.store', $review->id), ['vote_type' => 1])
        ->assertRedirect();

    expect(ReviewVote::count())->toBe(1);
    $this->assertDatabaseHas('review_votes', [
        'review_id' => $review->id,
        'user_id' => $voter->id,
        'vote_type' => 1,
    ]);

    $this->actingAs($voter)
        ->post(route('reviews.vote.store', $review->id), ['vote_type' => -1])
        ->assertRedirect();

    expect(ReviewVote::count())->toBe(1);
    $this->assertDatabaseHas('review_votes', [
        'review_id' => $review->id,
        'user_id' => $voter->id,
        'vote_type' => -1,
    ]);

    $this->actingAs($voter)
        ->delete(route('reviews.vote.destroy', $review->id))
        ->assertRedirect();

    $this->assertDatabaseMissing('review_votes', [
        'review_id' => $review->id,
        'user_id' => $voter->id,
    ]);
});

it('sorts shop reviews by score and shows vote state for the current user', function () {
    $author = User::factory()->create();
    $reviewer = User::factory()->create();

    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);

    $highScoreReview = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $reviewer->id,
        'comment' => 'Top ranked review',
    ]);
    $middleScoreReview = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $reviewer->id,
        'comment' => 'Middle ranked review',
    ]);
    $lowScoreReview = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $reviewer->id,
        'comment' => 'Lowest ranked review',
    ]);

    $userA = User::factory()->create();
    $userB = User::factory()->create();
    $userC = User::factory()->create();

    ReviewVote::create(['review_id' => $highScoreReview->id, 'user_id' => $userA->id, 'vote_type' => 1]);
    ReviewVote::create(['review_id' => $highScoreReview->id, 'user_id' => $userB->id, 'vote_type' => 1]);
    ReviewVote::create(['review_id' => $middleScoreReview->id, 'user_id' => $userA->id, 'vote_type' => 1]);
    ReviewVote::create(['review_id' => $middleScoreReview->id, 'user_id' => $userB->id, 'vote_type' => -1]);
    ReviewVote::create(['review_id' => $lowScoreReview->id, 'user_id' => $userC->id, 'vote_type' => -1]);

    $response = $this->actingAs($userA)->get(route('shops.show', $shop->id));

    $response->assertSuccessful();
    $response->assertSeeTextInOrder([
        'Top ranked review',
        'Middle ranked review',
        'Lowest ranked review',
    ]);
    $response->assertSeeText('👍 2');
    $response->assertSeeText('👎 1');
    $response->assertSeeText('Score: 2');
    $response->assertSee('bg-emerald-100', false);
});
