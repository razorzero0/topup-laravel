<?php

namespace App\Livewire\Product;

use Livewire\Component;

class Information extends Component
{
    public $name, $image, $company, $description, $style;
    // public function mount()
    // {
    //     $this->image = $image;
    //     $this->name = $name;
    //     $this->company = $company;
    //     $this->description = $description;
    // }
    public function render()
    {
        return view('livewire.product_partials.information');
    }
}
