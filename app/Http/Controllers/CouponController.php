<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupon::all();
        return view('admin.kupon.coupon', compact('data'));
    }

    public function cekDiskon(Request $request)
    {
        // Ambil kode kupon dari request
        $couponCode = $request->input('coupon_code');
        $gameCode = $request->input('game_code');
        $total = $request->input('total');

        // Cari kupon berdasarkan kode yang diberikan
        $coupon = Coupon::where('name', $couponCode)->get()->first();


        // Jika kupon ditemukan dan stoknya lebih dari 0
        if ($coupon && $coupon->stock > 0 && $gameCode == 'ff5' && $total > 0) {
            // Kurangi stok kupon sebanyak 1
            $coupon->stock -= 1; // Atau bisa menggunakan $coupon->decrement('stock');
            $coupon->save(); // Simpan perubahan ke database
            return response()->json(true); // Kembalikan true
        }

        // Jika tidak ditemukan atau stok habis
        return response()->json($coupon); // Kembalikan false
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'stock' => 'required|int',
        ]);

        $data = Coupon::find($id);
        $data->name =  $validated['name'];
        $data->stock =  $validated['stock'];
        $data->save();

        return back()->with('success', 'Edit Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
}
