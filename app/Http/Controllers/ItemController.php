<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code' => 'required|string|max:20|unique:items,item_code',
            'name'      => 'required|string|max:255',
            'category'  => 'required|string|max:100',
            'quantity'  => 'required|integer|min:1',
            'condition' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan!');
    }
}