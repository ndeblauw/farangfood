<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::all();

        return view ('home.food.index', ['food' => $food]);
    }

    public function create()
    {
        return view('home.food.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);

        Food::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('home.food.index');
    }

    public function edit($id)
    {
        $food = Food::findOrFail($id);

        return view('home.food.edit', ['food' => $food]);
    }

    public function update(Request $request, $id)
    {
        $food = Food::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3']
        ]);

        $food->update([
            'name' => $data['name'],
        ]);

        return redirect()->route('home.food.index');
    }

    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();

        return redirect()->route('home.food.index');
    }
}
