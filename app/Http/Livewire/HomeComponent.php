<?php

namespace App\Http\Livewire;

use App\Models\FeaturedProduct;
use Livewire\Component;

class HomeComponent extends Component
{
    public $featuredProducts;
    public function render()
    {
        // Obtén los productos destacados desde tu controlador o servicio
        $this->featuredProducts = FeaturedProduct::with('product')->get();

        return view('livewire.home-component')->layout('layouts.base');
    }
}
