<?php

use App\Models\Review;
use App\Models\ReviewLike;
use App\Models\Shop;
use App\Models\User;

it('allows an authenticated user to like a review once', function () {
    $user = User::factory()->create();
    $author = User::factory()->create();
    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);
    $review = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $author->id,
    ]);

    $this->actingAs($user)
        ->postJson(route('reviews.likes.store', $review))
        ->assertSuccessful()
        ->assertJson([
            'liked' => true,
            'like_count' => 1,
        ]);

    $this->actingAs($user)
        ->postJson(route('reviews.likes.store', $review))
        ->assertSuccessful()
        ->assertJson([
            'liked' => true,
            'like_count' => 1,
        ]);

    expect(ReviewLike::where('review_id', $review->id)->where('user_id', $user->id)->count())
        ->toBe(1);
});

it('allows an authenticated user to unlike a review', function () {
    $user = User::factory()->create();
    $author = User::factory()->create();
    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);
    $review = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $author->id,
    ]);

    ReviewLike::factory()->create([
        'user_id' => $user->id,
        'review_id' => $review->id,
    ]);

    $this->actingAs($user)
        ->deleteJson(route('reviews.likes.destroy', $review))
        ->assertSuccessful()
        ->assertJson([
            'liked' => false,
            'like_count' => 0,
        ]);

    expect(ReviewLike::where('review_id', $review->id)->where('user_id', $user->id)->exists())
        ->toBeFalse();
});

it('shows review like counts on the shop page', function () {
    $author = User::factory()->create();
    $likerA = User::factory()->create();
    $likerB = User::factory()->create();

    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);
    $review = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $author->id,
        'comment' => 'Very good noodles.',
    ]);

    ReviewLike::factory()->create(['user_id' => $likerA->id, 'review_id' => $review->id]);
    ReviewLike::factory()->create(['user_id' => $likerB->id, 'review_id' => $review->id]);

    $this->get(route('shops.show', $shop->id))
        ->assertSuccessful()
        ->assertSeeText('Likes: 2');
});

it('requires authentication to like a review', function () {
    $author = User::factory()->create();
    $shop = Shop::factory()->create([
        'author_id' => $author->id,
        'is_published' => true,
    ]);
    $review = Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $author->id,
    ]);

    $this->post(route('reviews.likes.store', $review))
        ->assertRedirect(route('login'));
});
