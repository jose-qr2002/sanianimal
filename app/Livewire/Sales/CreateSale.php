<?php

namespace App\Livewire\Sales;

use Livewire\Component;

class CreateSale extends Component
{
    public $customer_id;
    public $payment_method;
    public $date;
    public $time;

    public function rules() {
        $rules_form = ['customer_id'];
    }

    public function render()
    {
        return view('livewire.sales.create-sale');
    }
}
