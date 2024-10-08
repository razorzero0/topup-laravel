<?php

namespace App\Livewire;

use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\DigiflazzService;
use App\Services\TripayService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductDetail extends Component
{

    public $user_id, $email, $tripayService, $product, $kodeKupon, $diskonKupon, $data, $payment, $price, $itemPrice, $total, $itemId, $itemCode, $itemName, $payName, $payCode, $phone, $id_player;
    public function rules()
    {
        return [
            'email' => 'email',
            'product' => 'required',
            'kodeKupon' => 'nullable|string',
            'diskonKupon' => 'nullable|numeric',
            'data' => 'required|array',
            'payment' => 'required',
            'price' => 'required|numeric',
            'itemPrice' => 'required|numeric',
            'total' => 'required|numeric',
            'itemId' => 'required|string',
            'itemCode' => 'required|string',
            'itemName' => 'required|string',
            'payName' => 'required|string',
            'payCode' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'id_player' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'product.required' => 'Nama produk tidak boleh kosong.',
            // 'product.string' => 'Nama produk harus berupa teks.',
            'kodeKupon.string' => 'Kode kupon harus berupa teks.',
            'diskonKupon.numeric' => 'Diskon kupon harus berupa angka.',
            'data.required' => 'Data tidak boleh kosong.',
            'data.array' => 'Data harus dalam format array.',
            'payment.required' => 'Metode pembayaran tidak boleh kosong.',
            // 'payment.string' => 'Metode pembayaran harus berupa teks.',
            'price.required' => 'Harga tidak boleh kosong.',
            'price.numeric' => 'Harga harus berupa angka.',
            'itemPrice.required' => 'Harga item tidak boleh kosong.',
            'itemPrice.numeric' => 'Harga item harus berupa angka.',
            'total.required' => 'Total tidak boleh kosong.',
            'total.numeric' => 'Total harus berupa angka.',
            'itemId.required' => 'Mohon pilih jumlah item.',
            'itemId.string' => 'ID item harus berupa teks.',
            'itemCode.required' => 'Kode item tidak boleh kosong.',
            'itemCode.string' => 'Kode item harus berupa teks.',
            'itemName.required' => 'Nama item tidak boleh kosong.',
            'itemName.string' => 'Nama item harus berupa teks.',
            'payName.required' => 'Nama pembayaran tidak boleh kosong.',
            'payName.string' => 'Nama pembayaran harus berupa teks.',
            'payCode.required' => 'Mohon pilih metode pembayaran',
            'payCode.string' => 'Kode pembayaran harus berupa teks.',
            'phone.required' => 'Nomor telepon tidak boleh kosong.',
            'phone.numeric' => 'Nomor telepon harus berupa angka.',
            'phone.min' => 'Nomor telepon harus memiliki minimal 10 karakter.',
            'id_player.required' => 'ID pemain tidak boleh kosong.',
            'id_player.string' => 'ID pemain harus berupa teks.',
        ];
    }

    // Masih bisa melakukan dependency injection di sini
    public function mount($slug, TripayService $tripayService)
    {
        $this->user_id = Auth::id() ?? 1;
        $this->email = env('APP_EMAIL');
        // Ambil produk berdasarkan slug
        $this->product = Product::where('slug', $slug)->first();

        // Ambil item yang sesuai dengan kondisi
        $this->data = Item::whereHas('product', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->where('status', true)  // Filter item dengan status true
            ->where('stock', '>', 0)  // Filter item dengan stock > 1
            ->get();

        // Langsung gunakan tripayService di sini untuk mengambil channel pembayaran

        $payment = $tripayService->getPaymentChannels();

        // Jika pengambilan sukses, simpan payment data dalam variabel view
        if ($payment['success']) {
            $this->payment = collect($payment['data'])->groupBy('group')->reverse();
        } else {
            $this->payment = collect();  // Jika gagal, set sebagai collection kosong
        }
    }

    public function addItem($price, $name, $id, $code)
    {

        $this->total = $price;
        $this->price = $price;
        $this->itemName = $name;
        $this->itemId = $id;
        $this->itemCode = $code;
        $this->itemPrice = $price;
        $this->payName = '';
        $this->payCode = '';
    }
    public function addPay($price, $name, $id)
    {
        // dd($price . $name . $id);
        $this->total = $price;
        $this->price = $price;
        $this->payName = $name;
        $this->payCode = $id;
    }

    public function cekKupon()
    {
        $coupon = Coupon::where('name', $this->kodeKupon)->first();

        if ($coupon && $coupon->stock > 0 && $this->itemId == $coupon->item_id && $this->total > 0) {
            $discount = $this->total * $coupon->percent / 100;
            $coupon->decrement('stock');
            $priceAfterDiscount = $this->total - $discount;
            $this->diskonKupon = $coupon->percent;
            $this->total = $priceAfterDiscount;

            // Dispatch event untuk notifikasi sukses
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Kupon valid dan stock tersedia!']);
        } else {
            // Dispatch event untuk notifikasi error
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Kupon tidak valid atau stock habis!']);
        }
    }

    public function makeTransaction(TripayService $tripayService, DigiflazzService $digiflazzService)
    {

        // dd($this->user_id ?? 1);
        $this->validate();

        $random = rand(100000000000, 999999999999);

        $method = $this->payCode;
        $merchantRef = 'ALG' . $random;
        $amount = $this->total;
        $customerDetails = [
            'name' => 'user' . $random,  // Ganti dengan nama produk yang diinginkan
            'email' => $this->email,          // Ganti dengan harga produk
            'phone' => $this->phone            // Ganti dengan jumlah produk
        ];

        $orderItems = [
            [
                'name' => $this->itemName,
                'price' => $this->total,
                'quantity' => 1,
                // Jika perlu, tambahkan `sku`, `product_url`, dan `image_url`
            ]
        ];


        if ($this->total >= 1000) {
            $tripay = $tripayService->makeTransaction($method, $merchantRef, $amount, $customerDetails, $orderItems);
            if ($tripay['success']) {
                // dd($tripay);
                // Create the invoice
                Invoice::create([
                    'id' => $tripay['data']['merchant_ref'], // Generate UUID
                    'tripay_reference' => $tripay['data']['reference'], // Tripay reference
                    'method' => $tripay['data']['payment_method'], // Payment method
                    'merchant_ref' => $tripay['data']['merchant_ref'], // Merchant reference
                    'amount' => $tripay['data']['amount'], // Amount
                    'total_fee' => $tripay['data']['total_fee'], // Total fee
                    'amount_received' => $tripay['data']['amount_received'], // Amount received
                    'customer_name' => $tripay['data']['customer_name'], // Customer name
                    'customer_email' => $tripay['data']['customer_email'], // Customer email
                    'customer_phone' => $tripay['data']['customer_phone'], // Customer phone
                    'order_items' => json_encode($tripay['data']['order_items']), // Order items as JSON
                    'callback_url' => $tripay['data']['callback_url'], // Callback URL
                    'return_url' => $tripay['data']['return_url'], // Return URL
                    'status' => $tripay['data']['status'], // Payment status
                    'expired_time' => $tripay['data']['expired_time'], // Expiration time (unix timestamp)
                    'pay_url' => $tripay['data']['pay_url'], // Pay URL
                    'checkout_url' => $tripay['data']['checkout_url'], // Checkout URL
                    'instructions' => json_encode($tripay['data']['instructions']), // Payment instructions as JSON
                    'qr_url' => $tripay['data']['qr_url'] ?? '',
                ]);
                Transaction::create([
                    'invoice_id' =>  $tripay['data']['merchant_ref'],
                    'kode_pengguna' => $this->user_id,
                    'customer_no' => $this->id_player,
                    'buyer_sku_code' => $this->itemCode,
                    'status' => 'pending',
                    'price' => $this->total,

                ]);
                // Redirect to the invoice page
                if (isset($tripay['data']['pay_url'])) {
                    return redirect($tripay['data']['pay_url']);
                } else {
                    return $this->redirect(route('invoice', $tripay['data']['merchant_ref']), navigate: true);
                }
            } else {
                // Handle error, display alert
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon periksa input lagi!']);
            }
        } else if ($this->total >= 0 && $this->total <= 999) {

            $hook = $digiflazzService->makeTransaction($this->id_player, $merchantRef, $this->itemCode);

            // dd($hook);
            if (isset($hook['data']['status'])) {
                if (
                    strtolower($hook['data']['status']) == 'pending' ||
                    strtolower($hook['data']['status']) == 'sukses'
                ) {
                    dd($hook);
                    Transaction::create([
                        'ref_id' => $merchantRef,
                        'kode_pengguna' => $this->user_id,
                        'customer_no' => $this->id_player,
                        'buyer_sku_code' => $this->itemCode,
                        'status' => 'pending',
                        'buyer_last_saldo' => '0',
                        'sn' => 'topup',
                        'price' => $this->total,
                    ]);
                } else {
                    $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon coba beberapa saat lagi.']);
                }
            } else {
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon coba beberapa saat lagi.']);
            }
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Pembayaran dibawah Rp 1.000 tidak didukung!']);
        }
    }


    public function render()
    {
        return view('livewire.product');
    }
}
