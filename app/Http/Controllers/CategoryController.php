<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    protected $digiflazzService;


    public function __construct(DigiflazzService $digiflazzService)
    {


        $this->digiflazzService = $digiflazzService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Category::all();
        $digiflazz = $this->digiflazzService->PriceList();
        // dd($digiflazz);


        return view('admin.kategori.kategori', ['data' => $data, 'digiflazz' => $digiflazz->unique('category')]);
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
            'name' => 'required|unique:categories,name',

        ]);

        // Simpan data ke tabel transactions
        $stmt = Category::create([
            'name' => $request->name,
        ]);

        if ($stmt) {
            return back()->with('success', 'tambah data kategori Sukses');
        }
        return back()->with('error', 'tambah data kategori Gagal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $data = Category::find($id);
        $data->name =  $validated['name'];
        $data->save();
        if ($data) {
            return back()->with('success', 'Edit Berhasil!');
        }
        return back()->with('error', 'Edit Gagal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stmt = Category::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Data kategori Sukses');
        }
        return back()->with('error', 'Hapus Data kategori Gagal');
    }
}
