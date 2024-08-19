<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use Illuminate\Http\Request;

class HistoriaClinicaController extends Controller
{
    public function index(){
        $historias = HistoriaClinica::all();
        return view('historias.index', compact('historias'));
    }
}
