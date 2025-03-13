<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Color;
use App\Models\Item;

class ItemController extends Controller
{
    public function create()
    {
        $types=Type::all();
        $colors=Color::all();

        return view('item.create', compact('types', 'colors'));
    }

    //proses simpan data
    public function store(Request $request)
    {
        // dd($request->name);

        //validate dulu input
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'color' => 'required',
            'quantity' => 'required|integer'
        ]);

        // dd($request->all());

        //lepas dah validate, kalau input betul, baru store data dalam database
        Item::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'color_id' => $request->color,
            'type_id' => $request->type,
        ]);

        //then bila dah store data, hantar user pergi balik ke index page
        return redirect()->route('home');
    }

    public function show(Item $item)
    {
        // dd($item->color, $item->type);
        return view('item.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $this->authorize('update', $item);

        // dd($type);
        $types=Type::all();
        $colors=Color::all();
        return view('item.edit', compact('item', 'types', 'colors'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'type' => 'required',
            'color' => 'required',
        ]);

        $item->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'type_id' => $request->type,
            'color_id' => $request->color,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return back();
    }

}
