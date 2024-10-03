<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::paginate(10);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {

    }

    public function show(Service $service)
    {

    }

    public function edit(Service $service)
    {

    }

    public function update(Request $request, Service $service)
    {

    }
    
    public function destroy(Service $service)
    {

    }
}
