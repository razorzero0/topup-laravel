<?php

namespace App\Livewire;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Popular;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public $data, $categories, $popular, $banner;

    public function mount()
    {

        $this->popular = Popular::all();
        $this->data = Product::all();
        $this->categories = Category::all();
        $this->banner = Banner::all();
    }
    public function render()
    {
        return view('livewire.home');
    }
}
