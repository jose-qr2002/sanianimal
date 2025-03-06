<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCustomers(){
        $customers = Customer::select(['id','name','lastname','phone'])->get();
        return json_encode($customers);
    }

    public function getProducts(){
        $products = Product::select(['id','name','price','measurement'])->get();
        return json_encode($products);
    }

    public function getServices(){
        $services = Service::select(['id','name','price'])->get();
        return json_encode($services);
    }
}
