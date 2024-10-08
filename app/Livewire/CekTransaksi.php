<?php

namespace App\Livewire;

use App\Models\Invoice;
use Livewire\Component;

class CekTransaksi extends Component
{
    public $data, $query;
    public function render()
    {
        return view('livewire.cek-transaksi');
    }

    public function cekInvoice()
    {


        $this->data =  Invoice::find($this->query);
        // dd($this->data);
    }
}
