<?php

namespace App\Livewire;

use App\Models\Invoice as ModelsInvoice;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Invoice extends Component
{
    public $invoice, $instructions, $items;
    public function mount(string $id)
    {
        $this->invoice = ModelsInvoice::findOrFail($id);
        $this->instructions = json_decode($this->invoice['instructions'], true);
        $this->items = json_decode($this->invoice['order_items'], true);
    }
    public function render()
    {
        // dd($this->invoice);
        return view('livewire.invoice');
    }

    public function tes()
    {
        $this->dispatch('alert', ['type' => 'success', 'message' => 'Kupon valid dan stock tersedia!']);
    }
}
