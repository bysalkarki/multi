<?php

namespace App\Livewire;

use App\Models\Customer as ModelsCustomer;
use Livewire\Component;

class Customer extends Component
{
    public function render()
    {
        $customers = ModelsCustomer::with('tenant')->get();
        return view('livewire.customer', compact('customers'));
    }
    
}

