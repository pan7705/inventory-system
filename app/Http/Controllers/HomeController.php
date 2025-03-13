<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;

        //another way
        // $items = Item::where(function ($query) use ($search) {
        //     $query->when($search, function ($query, $search) {
        //         $query->where('name', 'like', '%' . $search . '%');
        //     });
        // })->latest()->paginate(10);


        $items = Item::latest()->search($search)->paginate(10);
        return view('home', compact('items'));
    }
}
