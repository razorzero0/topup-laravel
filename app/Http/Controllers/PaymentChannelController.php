<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\TripayService;
use Illuminate\Http\Request;

class PaymentChannelController extends Controller
{
    protected $tripayService;

    public function __construct(TripayService $tripayService)
    {
        $this->tripayService = $tripayService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Payment::all();
        $payment = $this->tripayService->getPaymentChannels();
        $p = $payment['data'];
        $paymentunique = collect($p)->unique('group');

        // dd($payment['data']);
        return view('admin.payment.payment', ['data' => $data, 'pay' => $p, 'payment_unique' => $paymentunique]);
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

            'group' => 'required|unique:payments,group',
            'fee' => 'required|numeric',
        ]);

        if (Payment::count() < 3) {

            // Simpan data ke tabel transactions
            $stmt = Payment::create([
                'group' => $request->group,
                'fee' => $request->fee,
            ]);

            if ($stmt) {
                return back()->with('success', 'tambah Fee Payment Sukses');
            }
            return back()->with('error', 'tambah Fee Payment Gagal');
        } else {
            return back()->with('error', 'Max 3 Fee Payment');
        }
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
        $stmt = Payment::find($id)->delete();
        if ($stmt) {
            return back()->with('success', 'Hapus Data Fee Group Sukses');
        }
        return back()->with('error', 'Hapus Data Fee Group Gagal');
    }
}
