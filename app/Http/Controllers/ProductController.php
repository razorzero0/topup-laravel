<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use App\Services\DigiflazzService;
use App\Services\TripayService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $digiflazzService, $tripayService;


    public function __construct(DigiflazzService $digiflazzService, TripayService $tripayService)
    {


        $this->digiflazzService = $digiflazzService->PriceList();
        $this->tripayService = $tripayService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data =  Product::latest()->get();
        $category = Category::all();
        $harga = Item::sum('total_price');

        return view('admin.produk.produk', ['data' => $data, 'category' => $category, 'harga' => $harga]);
    }
    public function filterProduct(Request $request)
    {
        // Mengambil nilai kategori dari request
        $filter = $request->input('category');

        // Filter koleksi berdasarkan key 'category' yang sesuai dengan request
        $filteredData = $this->digiflazzService->where('category', $filter);
        $response = json_decode($filteredData);
        return $response;
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


        $slug = Str::slug($request->name, '-');
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $stmt = Product::create([
            'slug' => $slug,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'images/' . $imageName,
            'company' => $request->company,
        ]);

        if ($stmt) {
            return back()->with('success', 'tambah data Produk Sukses');
        }
        return back()->with('error', 'tambah data Produk Gagal');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $data = Item::whereHas('product', function ($query) use ($id) {
            $query->where('slug', $id);
        })
            ->where('status', true)  // Filter item dengan status true
            ->where('stock', '>', 0)  // Filter item dengan stock > 1
            ->get();

        $product = Product::where('slug', $id)->first();
        // dd($data);
        $payment = $this->tripayService->getPaymentChannels();
        if ($payment['success']) {
            $payment = $payment['data'];
        }
        $groupedData = collect($payment)->groupBy('group')->reverse();

        // Contoh debug atau passing ke view
        // dd($groupedData);
        if ($data) {
            return view('livewire.detail', [
                'data' => $data,
                'product' => $product,
                'payment' => $groupedData
            ]);
        } else {
            return redirect('/')->with('error', 'Mohon maaf atas ganggunannya, silahkan coba lagi');
        }
    }

    // public function getProductDetails($id)
    // {
    //     // Step 1: Inisialisasi Guzzle Client
    //     $client = new Client();

    //     // Step 2: Mendapatkan data dari API Digiflazz
    //     try {
    //         $response = $client->post('https://api.digiflazz.com/v1/price-list', [
    //             'json' => [
    //                 'cmd' => 'prepaid',
    //                 'username' => env('DIGIFLAZZ_USERNAME'),
    //                 'sign' => md5(env('DIGIFLAZZ_USERNAME') . env('DIGIFLAZZ_PRODUCTION_KEY') . 'pricelist'),
    //             ]
    //         ]);

    //         $responseBody = $response->getBody()->getContents();
    //         $result = json_decode($responseBody, true);

    //         // Step 3: Koleksi data lokal (game descriptions)
    //         $data = collect([
    //             'ml' => [
    //                 'name' => 'MOBILE LEGENDS',
    //                 'img' => 'assets/img/ml.webp',
    //                 'deskripsi' => 'Mobile Legends: Bang Bang adalah game Multiplayer Online Battle Arena (MOBA) yang dikembangkan oleh Moonton.',
    //             ],
    //             'ffmax' => [
    //                 'name' => 'FREE FIRE MAX',
    //                 'img' => 'assets/img/ffmax.jpg',
    //                 'deskripsi' => 'Free Fire atau FF adalah game battle royale gratis yang dikembangkan oleh Garena.',
    //             ],
    //             'ff' => [
    //                 'name' => 'FREE FIRE',
    //                 'img' => 'assets/img/ff.jpg',
    //                 'deskripsi' => 'Free Fire atau FF adalah game battle royale gratis yang diterbitkan oleh Garena untuk Android dan iOS.',
    //             ],
    //             'gs' => [
    //                 'publisher' => '',
    //                 'name' => 'GARENA SHELL',
    //                 'img' => 'assets/img/garena-sheel.png',
    //                 'deskripsi' => 'Garena Shell adalah mata uang virtual yang bisa digunakan untuk membeli item dan layanan di platform game Garena dan game-game yang dioperasikan Garena. Garena Shell bisa digunakan untuk mengisi Diamond Free Fire, Voucher di Arena of Valor, atau RP di League of Legends.',
    //             ],
    //         ]);

    //         // Step 4: Memetakan brand berdasarkan id request
    //         $brandMapping = [
    //             'ml' => 'MOBILE LEGENDS',
    //             'ff' => 'FREE FIRE',
    //             'ffmax' => 'FREE FIRE MAX',
    //             'gs' => 'GARENA',
    //         ];


    //         // Step 5: Filter data API berdasarkan brand sesuai ID yang direquest
    //         $filteredProducts = collect($result['data'])->filter(function ($product) use ($brandMapping, $id) {
    //             // Debug setiap produk untuk melihat struktur dan brand
    //             if (!isset($product['brand'])) {
    //                 return false;
    //             }
    //             return strtolower($product['brand']) === strtolower($brandMapping[$id]);
    //         });

    //         // Step 6: Gabungkan data lokal dengan hasil filter API
    //         $localData = $data->get($id);
    //         $combinedData = array_merge($localData, [
    //             'items' => $filteredProducts->values()->all() // Mengambil produk yang difilter dari API
    //         ]);

    //         // Step 7: Mengirim data ke view atau API response
    //         $final = collect($combinedData)->reverse();
    //         return $combinedData;
    //     } catch (\Exception $e) {
    //         return false;
    //     }
    // }


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
        // Temukan produk berdasarkan id
        $product = Product::findOrFail($id);

        // Buat slug baru dari nama produk yang akan diupdate
        $slug = Str::slug($request->name, '-');

        // Lakukan validasi data
        $request->validate([
            'name' => 'required',
            // 'description' => 'required',
            // 'company' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,,webp|max:2048',
        ]);

        // Jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image)); // Hapus file gambar lama
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = 'images/' . $imageName;
        }

        // Update field lainnya
        $product->slug = $slug;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description ?? "";
        $product->company = $request->company ?? "";

        // Simpan perubahan ke database
        if ($product->save()) {
            return redirect('product')->with('success', 'Update data Produk Sukses');
        }

        return redirect('product')->with('error', 'Update data Produk Gagal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            // Dapatkan nama file gambar
            $imageName = $product->image;
            $filePath = public_path($imageName);

            // Hapus file gambar jika file ada
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Hapus produk dari database
            $stmt = $product->delete();

            if ($stmt) {
                return back()->with('success', 'Hapus Produk Sukses');
            } else {
                return back()->with('error', 'Hapus Produk Gagal');
            }
        } else {
            return back()->with('error', 'Produk tidak ditemukan');
        }
    }
}
