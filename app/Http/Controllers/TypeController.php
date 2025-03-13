<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;


class TypeController extends Controller
{
    public function index()
    {
        $types=Type::paginate(3);

        return view('type.index', compact('types')); //bukak home page type

    }

    public function create()
    {
        return view('type.create'); //bukak page create type
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
        Type::create([
            'name' => $request->name,
        ]);

        //then bila dah store data, hantar user pergi balik ke index page
        return redirect()->route('type.index');
    }

    public function edit(Type $type)
    {
        // dd($type);
        return view ('type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('type.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return back();
    }
}
