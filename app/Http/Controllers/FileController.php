<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = File::all();
        return view('admin.file.file', ['data' => $data]);
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

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $stmt = File::create([
            'name' => $request->name,
            'image' => 'images/' . $imageName,
        ]);

        if ($stmt) {
            return back()->with('success', 'Tambah File Sukses');
        }
        return back()->with('error', 'Tambah File Gagal');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = File::find($id);
        // Lakukan validasi data
        $request->validate([
            'name' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($file->image && file_exists(public_path($file->image))) {
                unlink(public_path($file->image)); // Hapus file gambar lama
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $file->image = 'images/' . $imageName;
        }

        $file->name = $request->name;


        // Simpan perubahan ke database
        if ($file->save()) {
            return redirect()->back()->with('success', 'Update File Sukses');
        }

        return redirect()->back()->with('error', 'Update File Gagal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $file = File::find($id);

        if ($file) {
            // Dapatkan nama file gambar
            $imageName = $file->image;
            $filePath = public_path($imageName);

            // Hapus file gambar jika file ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus produk dari database
            $stmt = $file->delete();

            if ($stmt) {
                return back()->with('success', 'Hapus File Sukses');
            } else {
                return back()->with('error', 'Hapus File Gagal');
            }
        } else {
            return back()->with('error', 'File tidak ditemukan');
        }
    }
}
