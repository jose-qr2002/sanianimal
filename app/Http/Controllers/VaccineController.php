<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    /**
     * Muestra todo los registros de vacunas en formato json
     */
    public function index() {
        $vaccines = Vaccine::select('id','vaccine')->get();
        return response()->json($vaccines);
    }
}
