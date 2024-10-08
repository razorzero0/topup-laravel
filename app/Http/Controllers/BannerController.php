<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Banner::all();
        $images = File::all();
        return view('admin.banner.banner', ['data' => $data, 'images' => $images]);
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
            'image' => 'required',

        ]);
        if (Banner::count() < 3) {
            // Simpan data ke tabel transactions
            $stmt = Banner::create([
                'image' => $request->image,
            ]);

            if ($stmt) {
                return back()->with('success', 'Tambah Gambar Banner Sukses');
            }
            return back()->with('error', 'Tambah Gambar Banner Gagal');
        }
        return back()->with('error', 'Maksimal 3 Gambar Banner');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'image' => 'required',
        ]);

        $data = Banner::find($id);
        $data->image =  $validated['image'];
        $data->save();
        if ($data) {
            return back()->with('success', 'Edit Gambar Banner Berhasil!');
        }
        return back()->with('error', 'Edit Gambar Banner Gagal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stmt = Banner::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Gambar Banner Sukses');
        }
        return back()->with('error', 'Hapus Gambar Banner Gagal');
    }
}
