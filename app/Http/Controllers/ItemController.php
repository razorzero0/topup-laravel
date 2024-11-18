<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Item;
use App\Models\Product;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class ItemController extends Controller
{

    protected $digiflazzService;


    public function __construct(DigiflazzService $digiflazzService)
    {

        $this->digiflazzService = $digiflazzService->PriceList();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Product::latest()->get();
        $category = Category::all();

        return view('admin.produk.produk', ['data' => $data, 'category' => $category]);
    }
    public function getItem(string $id)
    {
        $image = File::all();
        $data =  Item::where('product_id', $id)->get()->sortBy('price');
        $name = Product::find($id)['name'];
        // dd($name['name']);
        // Kirim data ke view dengan key 'data'
        $harga = Item::where('product_id', $id)->sum('total_price');


        $digiData = $this->digiflazzService->where('brand', $name)->sortBy('price');
        return view('admin.item.item', ['data' => $data, 'digiData' => $digiData, 'harga' => $harga, 'name' => $name, 'images' => $image, 'id_product' => $id]);
    }
    public function listItem(string $id)
    {
        $product =  Product::findOrFail($id);
        $data = $this->digiflazzService->where('brand', $product->name)->sortBy('price');
        // dd($data);

        if ($data) {
            return view('admin.item.add-modal', ['data' => $data, 'id' => $id]);
        } else {
            return back()->with('error', 'Ada gangguan jaringan, silakan coba lagi');
        }
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
        // Validasi input dari form
        $request->validate([
            'product_name' => 'required',
            'buyer_sku_code' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'product_id' => 'required',
        ]);

        // Simpan data ke database
        $stmt = Item::create([
            'item_name' => $request->product_name,
            'product_id' => $request->product_id,
            'buyer_sku_code' => $request->buyer_sku_code,
            'price' => $request->price,
            'total_price' => $request->price * $request->stock,
            'stock' => $request->stock,
            'status' => 0,
        ]);

        // Check apakah data berhasil disimpan
        if ($stmt) {
            return redirect()->route('get-item', ['id' => $request->product_id])
                ->with('success', 'Data Item berhasil ditambahkan');
        }


        return back()->with('error', 'Gagal menambahkan data Item');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id) {}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  Product::findOrFail($id);
        $category = Category::all();
        $selectedProduct = $this->digiflazzService->where('category', $data->category->name);
        $product = $selectedProduct->unique('brand');

        return view('admin.produk.edit-modal', ['product' => $data, 'category' => $category, 'selectProduct' => $product]);
    }


    public function getProduct(Request $request)
    {

        $filter = $request->input('selectedValue');
        // Filter koleksi berdasarkan key 'category' yang sesuai dengan request
        $filteredData = $this->digiflazzService->where('category', $filter);
        $data = $filteredData->unique('brand');
        // $response = json_decode($filter);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required',
        ]);

        $data = Item::find($id);
        $data->item_name =  $validated['name'];
        $data->price =  $validated['price'];
        $data->total_price =  $validated['price'] * $validated['stock'];
        $data->stock =  $validated['stock'];
        $data->image =  $validated['image'];
        $data->status =  $request['status'] ?? 0;
        $data->save();
        if ($data) {
            return back()->with('success', 'Edit Berhasil!');
        }
        return back()->with('error', 'Edit Gagal!');
    }

    public function disableAllItem(Request $request)
    {


        $data = Item::where('status', 1)->where('product_id', $request->id)->update(['status' => 0]);

        if ($data) {
            return back()->with('success', 'Disable Semua Item Berhasil!');
        }
        return back()->with('error', 'Disable Semua Item Gagal!');
    }
    public function enableAllItem(Request $request)
    {


        $data = Item::where('status', 0)->where('product_id', $request->id)->update(['status' => 1]);

        if ($data) {
            return back()->with('success', 'Enable Semua Item Berhasil!');
        }
        return back()->with('error', 'Enable Semua Item Gagal!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stmt = Item::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Item Sukses');
        }
        return back()->with('error', 'Hapus Item Gagal');
    }
}
