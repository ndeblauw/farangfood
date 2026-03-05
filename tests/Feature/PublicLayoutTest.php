<?php

use App\Models\Food;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;

it('renders the responsive public layout with navigation and footer', function () {
    $response = $this->get(route('home'));

    $response->assertSuccessful();
    $response->assertSeeText('Food For Farang');
    $response->assertSee('max-w-7xl', false);
    $response->assertSeeText('Menu');
});

it('renders responsive shop and food pages', function () {
    $author = User::factory()->create();
    $reviewer = User::factory()->create();

    $shop = Shop::factory()->create([
        'author_id' => $author->id,
    ]);

    $food = Food::factory()->create();
    $shop->foods()->attach($food->id);

    Review::factory()->create([
        'shop_id' => $shop->id,
        'author_id' => $reviewer->id,
        'comment' => 'Great view and excellent noodles.',
    ]);

    $shopResponse = $this->get(route('shops.show', $shop->id));
    $shopResponse->assertSuccessful();
    $shopResponse->assertSeeText('Foods available');
    $shopResponse->assertSeeText('Recent reviews');

    $foodResponse = $this->get(route('food.show', $food->id));
    $foodResponse->assertSuccessful();
    $foodResponse->assertSeeText('Available at these shops');
});
