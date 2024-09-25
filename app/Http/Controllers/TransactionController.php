<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{

    protected $digiflazzService, $ref_id, $user_id;

    public function __construct(DigiflazzService $digiflazzService)
    {

        $this->user_id = Auth::id() ?? 1;
        $this->digiflazzService = $digiflazzService;
        $this->ref_id = uniqid('ref-');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::latest()->get();
        $saldo = $this->digiflazzService->cekSaldo();

        // dd($saldo);
        return view('admin.transaksi.transaksi', [
            'data' => $data,
            'saldo' => $saldo
        ]);
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
        // Validasi request

        $validator = Validator::make($request->all(), [
            'customer_no' => 'required|string',
            'buyer_sku_code' => 'string',
            'status' => 'string',
            'buyer_last_saldo' => 'integer',
            'sn' => 'string',
            'price' => 'required|integer',
        ]);

        $hook = $this->digiflazzService->makeTransaction($request->customer_no, $this->ref_id, $request->buyer_sku_code);

        if (isset($hook['data']['status']) && $request->customer_no && !$validator->fails()) {            // Simpan data ke tabel transactions
            Transaction::create([
                'ref_id' => $this->ref_id,
                'kode_pengguna' => $this->user_id,
                'customer_no' => $request->customer_no,
                'buyer_sku_code' => $request->buyer_sku_code,
                'status' => 'pending',
                'buyer_last_saldo' => '0',
                'sn' => 'topup',
                'price' => $request->price,
            ]);
            return $hook;
        } else {
            return false;
        }

        // Redirect atau response setelah sukses menyimpan
        // return redirect()->back()->with('success', 'Transaksi Berhasil Disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
