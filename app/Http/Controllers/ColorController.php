<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        $colors=Color::paginate(3);

        return view('color.index', compact('colors')); //bukak home page color

    }

    public function create()
    {
        return view('color.create'); //bukak page create color
    }

    //proses simpan data
    public function store(Request $request)
    {
        // dd($request->name);

        //validate dulu input
        $request->validate([
            'name' => 'required',
        ]);

        //lepas dah validate, kalau input betul, baru store data dalam database
        Color::create([
            'name' => $request->name,
        ]);

        //then bila dah store data, hantar user pergi balik ke index page
        return redirect()->route('color.index');
    }

    public function edit(Color $color)
    {
        // dd($color);
        return view ('color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $color->update([
            'name' => $request->name,
        ]);

        return redirect()->route('color.index');
    }

    public function destroy(Color $color){
        $color->delete();

        return back();
    }
}
