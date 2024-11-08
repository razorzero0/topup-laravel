<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class DiscountStatus extends Component
{
    public $transaction, $instructions, $items;
    public function mount(string $id)
    {
        $this->transaction = Transaction::where('ref_id', $id)->first();
    }
    public function render()
    {
        // dd($this->transaction);
        return view('livewire.discount-status');
    }
}
