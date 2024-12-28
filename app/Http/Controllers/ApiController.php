<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCustomers(){
        $customers = Customer::select(['id','name','lastname','phone'])->get();
        return json_encode($customers);
    }
}
