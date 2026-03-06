<?php

namespace App\Http\Controllers;

use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        // Load the foods
        $foods = \App\Models\Food::all();

        return view('foods.index', ['foods' => $foods]);
    }

    public function show(int $id)
    {
        $food = \App\Models\Food::find($id);

        return view('foods.show', ['food' => $food]);
    }
}
