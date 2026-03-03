<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();

        return view('home.shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the request
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'food_type' => ['required', 'string', 'max:255'],
            'price_level' => ['required', 'string', 'max:255'],
            'foods' => ['array'],
            'author_id' => ['required', 'integer'],
        ]);

        // 2. Create the shop
        $shop = Shop::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'address' => $data['address'],
            'food_type' => $data['food_type'],
            'price_level' => $data['price_level'],
            'author_id' => $data['author_id'],
        ]);

        $shop->foods()->sync($data['foods'] ?? []);

        // 3. Redirect to the shop index page
        return redirect()->route('home.shops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);

        return view('home.shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. get the shop (if it exists)
        $shop = Shop::findOrFail($id);

        // 2. validate the request
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'food_type' => ['required', 'string', 'max:255'],
            'price_level' => ['required', 'string', 'max:255'],
            'foods' => ['array'],
        ]);

        // 3. update the shop information
        $shop->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'address' => $data['address'],
            'food_type' => $data['food_type'],
            'price_level' => $data['price_level'],
        ]);

        $shop->foods()->sync($data['foods'] ?? []);

        // 4. redirect to the shop index page
        return redirect()->route('home.shops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. get the shop (if it exists)
        $shop = Shop::findOrFail($id);

        // 2. delete the shop
        $shop->delete();

        // 3. Redirect to the shop index page
        return redirect()->route('home.shops.index');
    }
}
