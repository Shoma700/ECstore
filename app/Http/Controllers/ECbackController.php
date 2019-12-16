<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ECbackController extends Controller
{
    public function back1()
    {
        return view('back.ec_back1');
    }
}