<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    function TempData() {
        return view('pages.temperature');
    }
}
