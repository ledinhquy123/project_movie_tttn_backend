<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use Illuminate\Http\Request;

class ComboController extends Controller
{
    public function index() {
        $combos = Combo::where('price', '<>', 0)->get();
        return response()->json([
            'combos' => $combos
        ]);
    }
}
