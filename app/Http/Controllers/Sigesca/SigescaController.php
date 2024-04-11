<?php

namespace App\Http\Controllers\Sigesca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SigescaController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('sigesca.index');
    }
}
