<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Popular;
use App\Models\Product;
use Illuminate\Http\Request;

class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $populars = Popular::all();
        $items = Product::all();
        return view('admin.popular_item.popular', ['data' => $populars, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',

        ]);

        // Simpan data ke tabel transactions
        $stmt = Popular::create([
            'product_id' => $request->product_id,
        ]);

        if ($stmt) {
            return back()->with('success', 'tambah data Popular Item Sukses');
        }
        return back()->with('error', 'tambah data Popular Item Gagal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Popular $popular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Popular $popular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Popular $popular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stmt = Popular::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Data Popular Item Sukses');
        }
        return back()->with('error', 'Hapus Data Popular Item Gagal');
    }
}
