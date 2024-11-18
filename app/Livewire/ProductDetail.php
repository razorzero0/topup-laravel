<?php

namespace App\Livewire;

use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\DigiflazzService;
use App\Services\MailtrapService;
use App\Services\TripayService;
use App\Services\WhatsappService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductDetail extends Component
{

    public $user_id, $email, $tripayService, $product, $kodeKupon, $diskonKupon, $data, $payment, $price, $itemPrice, $total, $itemId, $itemCode, $itemName, $payName, $payCode, $phone, $id_player, $zona_id, $category;

    public $deskripsiPlayer, $alertPlayer, $fee, $kuponStatus;
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
            'id_player' => 'required',
            'zona_id' => strtolower($this->product['name'])  ==  'mobile legends' ? 'required' : '',
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
            'id_player.required' => 'ID/Nomor tidak boleh kosong.',
            'zona_id.required' => 'Zona ID tidak boleh kosong.',
        ];
    }

    // Masih bisa melakukan dependency injection di sini
    public function mount($slug, TripayService $tripayService)
    {
        $this->kuponStatus = 0;
        $this->fee = collect(Payment::all());
        $this->user_id = Auth::id() ?? 1;
        $this->email = env('APP_EMAIL');
        // Ambil produk berdasarkan slug
        $this->product = Product::where('slug', $slug)->first();

        $this->category = $this->product->category['name'] ?? null;

        // Ambil item yang sesuai dengan kondisi
        $this->data = Item::whereHas('product', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
            ->where('status', true)  // Filter item dengan status true
            ->where('stock', '>', 1)  // Filter item dengan stock > 1
            ->orderBy('price')  // Urutkan berdasarkan harga secara menurun
            ->get();

        // Langsung gunakan tripayService di sini untuk mengambil channel pembayaran

        $payment = $tripayService->getPaymentChannels();
        // dd($payment);

        // Jika pengambilan sukses, simpan payment data dalam variabel view
        if ($payment['success']) {
            $this->payment = collect($payment['data'])->groupBy('group')->reverse();
        } else {
            $this->payment = collect();  // Jika gagal, set sebagai collection kosong
        }


        switch (trim(strtolower($this->category))) {
            case 'games':
                $this->deskripsiPlayer = "Masukkan ID Pengguna";
                $this->alertPlayer = "⚠️Harap memasukkan ID/UID game dengan hati-hati dan benar, karena kesalahan input dapat mengakibatkan proses gagal/salah tujuan dan bukan tanggung jawab kami. Terima kasih atas perhatian dan pengertiannya🙏!";
                break;
            case 'pulsa':
                $this->deskripsiPlayer = "Masukkan Nomer HP :";
                $this->alertPlayer = "⚠️ Mohon pastikan nomor handphone yang Anda masukkan benar, ya. Kami tidak bertanggung jawab atas kesalahan input nomor, dan jika nomor yang dimasukkan keliru, pulsa atau paket data bisa terkirim ke nomor yang salah. Terima kasih banyak atas perhatian dan pengertiannya 🙏!";
                break;
            case 'e-money':
                $this->deskripsiPlayer = "Masukkan Nomer Tujuan/HP :";
                $this->alertPlayer = "⚠️ Mohon pastikan nomor tujuan/hp sesuai pada akun E-Wallet anda. Kami tidak bertanggung jawab atas kesalahan input tujuan, dan jika nomor yang dimasukkan keliru, saldo bisa terkirim ke wallet yang salah. Terima kasih banyak atas perhatian dan pengertiannya 🙏!";
                break;
            default:
                // Penanganan jika category tidak dikenali
                $this->deskripsiPlayer = "Masukkan ID/No tujuan";
                $this->alertPlayer = "⚠️ Harap memasukkan ID/No tujuan dengan benar.";
                break;
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
        $this->price = $price;
        $this->payName = $name;
        $this->payCode = $id;

        if (!$this->kuponStatus) {
            $this->total = $price;
        }
    }

    public function cekKupon()
    {
        $coupon = Coupon::where('name', $this->kodeKupon)->first();

        if ($coupon && $coupon->stock > 0 && $this->itemId == $coupon->item_id && $this->total > 0) {
            $discount = floor($this->total * $coupon->percent / 100); // Membulatkan ke bawah
            $coupon->decrement('stock');
            $priceAfterDiscount = $this->total - $discount;
            $this->diskonKupon = $coupon->percent;
            $this->total = $priceAfterDiscount;
            $this->kuponStatus = 1;


            // Dispatch event untuk notifikasi sukses
            $this->dispatch('alert', ['type' => 'success', 'message' => 'Kupon valid dan stock tersedia!']);
        } else {
            // Dispatch event untuk notifikasi error
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Kupon tidak valid atau stock habis!']);
        }
    }

    public function sukses()
    {

        $this->total = '';
        $this->price = '';
        $this->itemName = '';
        $this->itemId = '';
        $this->itemCode = '';
        $this->itemPrice = '';
        $this->payName = '';
        $this->payCode = '';
        $this->phone = '';
        $this->id_player = '';
        $this->kodeKupon = '';
        $this->kuponStatus = 0;
    }



    public function start($method, $merchantRef, $amount, $customerDetails, $orderItems, $tripayService, $digiflazzService, $id_player)
    {

        if ($this->total >= 1000) {

            // dd($method, $merchantRef, $amount, $customerDetails, $orderItems);
            $tripay = $tripayService->makeTransaction($method, $merchantRef, $amount, $customerDetails, $orderItems);
            if ($tripay['success']) {
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
                    'ref_id' => $merchantRef,
                    'kode_pengguna' => $this->user_id,
                    'customer_no' => $id_player,
                    'item_name' => $this->itemName,
                    'customer_phone' => $this->phone,
                    'buyer_sku_code' => $this->itemCode,
                    'status' => 'Created',
                    'sn' => '-',
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
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon refresh halaman, dan coba lagi!']);
            }
        } else if ($this->total >= 0 && $this->total <= 999) {


            // dd($hook);
            if ($this->kuponStatus) {
                $hook = $digiflazzService->makeTransaction($id_player, $merchantRef, $this->itemCode);
                if (isset($hook['data']['status'])) {
                    if (
                        strtolower($hook['data']['status']) == 'pending' ||
                        strtolower($hook['data']['status']) == 'sukses'
                    ) {
                        Transaction::create([
                            'ref_id' => $merchantRef,
                            'kode_pengguna' => $this->user_id,
                            'customer_no' => $id_player,
                            'item_name' => $this->itemName,
                            'customer_phone' => $this->phone,
                            'buyer_sku_code' => $this->itemCode,
                            'status' => 'Pending',
                            'buyer_last_saldo' => '0',
                            'sn' => '-',
                            'price' => $this->total,
                        ]);


                        $this->kuponStatus = 0;
                        return $this->redirect(route('discount-status',  $merchantRef), navigate: true);

                        // $this->dispatch('alert', ['type' => 'success', 'message' => 'Transaksi berhasil! silahkan tunggu item masuk ke akun anda!']);
                    } else {
                        $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon coba beberapa saat lagi.']);
                    }
                } else {
                    $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon coba beberapa saat lagi atau refresh halaman.']);
                }
            } else {
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon refresh halaman.']);
            }
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Pembayaran dibawah Rp 1.000 tidak didukung!']);
        }
    }

    public function makeTransaction(TripayService $tripayService, DigiflazzService $digiflazzService)
    {

        // $trx = Transaction::where('ref_id', 'ALG751890681001')->first();

        // $tes = $whatsappService->validasiMessage($trx->invoice_id, env('APP_NO'), $trx->price, $trx['status']);
        // dd($amount);

        $this->validate();


        $random = rand(100000000000, 999999999999);
        $id_player = $this->id_player;
        $method = $this->payCode;
        $merchantRef = 'ALG' . $random;
        $amount = floor($this->total);
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

        $tes = 'CU-' . $random;
        $cek = substr($this->itemCode, 0, 2);
        $id = '';
        if (strtolower($cek) == 'ml') {
            $id = 'mlu';
            $id_player = $this->id_player . $this->zona_id;
        } else if (strtolower($cek) == 'ff') {
            $id = 'ffu';
        }

        // dd($id_player);

        $stmt = 1;
        if ($id) {
            $stmt = $digiflazzService->makeTransaction($id_player, $tes, $id);
            $stmt = isset($stmt['error']) ? 0 : 1;
        }

        $cekStock = Item::where('buyer_sku_code', $this->itemCode)->first();
        // dd($cekStock['stock']);
        if ($cekStock['stock'] > 0) {
            if ($stmt) {
                $this->start($method, $merchantRef, $amount, $customerDetails, $orderItems, $tripayService, $digiflazzService, $id_player);
            } else {
                $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, sistem masih terkendala! Mohon coba beberapa saat lagi.']);
            }
        } else {
            $this->dispatch('alert', ['type' => 'error', 'message' => 'Mohon maaf, Stock Item Habis! Mohon coba item lain.']);
        }
    }


    public function render()
    {
        // dd($this->fee);
        return view('livewire.product');
    }
}
