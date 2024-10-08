<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use App\Services\DigiflazzService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    protected $saldo;
    public function __construct(DigiflazzService $digiflazzService)
    {
        $this->saldo = $digiflazzService->cekSaldo();
    }
    public function index()
    {

        $users = User::role('user')->count();
        $transactions = Transaction::count();
        $products = Product::count();
        $saldo = $this->saldo['data']['deposit'];
        return view('admin.index', ['users' => $users, 'transactions' => $transactions, 'saldo' => $saldo, 'products' => $products]);
    }
}
