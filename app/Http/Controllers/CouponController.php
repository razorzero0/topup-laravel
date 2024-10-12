<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Item;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupon::all();
        $items = Item::all();
        return view('admin.kupon.coupon', ['data' => $data, 'items' => $items]);
    }

    public function cekDiskon(Request $request)
    {
        // Validasi input

        // Ambil kode kupon dari request
        $couponCode = $request->input('coupon_code');
        $gameCode = $request->input('game_code');
        $total = $request->input('total');

        // Cari kupon berdasarkan kode yang diberikan
        $coupon = Coupon::where('name', $couponCode)->first();

        // Jika kupon ditemukan dan stoknya lebih dari 0
        if ($coupon && $coupon->stock > 0 && $gameCode == $coupon->item_id && $total > 0) {
            // Hitung diskon
            $discount = $total * $coupon->percent / 100;

            // Kurangi stok kupon sebanyak 1
            $coupon->decrement('stock');

            // Hitung total harga setelah diskon
            $priceAfterDiscount = $total - $discount;

            // Return response JSON
            return response()->json([
                'diskon' => $coupon->percent,
                'price' => $priceAfterDiscount,
            ]);
        }

        // Jika kupon tidak valid
        return false;
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
            'item_id'  => 'required',
            'name' => 'required|unique:coupons,name',
            'stock' => 'required|numeric',
            'percent' => 'required|numeric|min:0|max:100',
        ]);
        // Simpan data ke tabel transactions
        $stmt = Coupon::create([
            'item_id' => $request->item_id,
            'name' => $request->name,
            'stock' => $request->stock,
            'percent' => $request->percent,
        ]);
        if ($stmt) {
            return back()->with('success', 'Tambah Kupon Berhasil!');
        }
        return back()->with('error', 'Tambah Kupon Gagal!');
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
            'item_id'  => 'required',
            'name' => 'required',
            'stock' => 'required|numeric',
            'percent' => 'required|numeric',
        ]);

        $stmt = Coupon::find($id);
        $stmt->name =  $validated['name'];
        $stmt->stock =  $validated['stock'];
        $stmt->item_id =  $validated['item_id'];
        $stmt->percent =  $validated['percent'];
        $stmt->save();

        if ($stmt) {
            return back()->with('success', 'Tambah Kupon Berhasil!');
        }
        return back()->with('error', 'Tambah Kupon Gagal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stmt = Coupon::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Kupon Sukses');
        }
        return back()->with('error', 'Hapus Kupon Gagal');
    }
}
