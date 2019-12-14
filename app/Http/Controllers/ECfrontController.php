<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ECfrontController extends Controller
{
    public function front1()
    {
        return view('front.ec_front1');
    }

}
