<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeinController extends Controller
{
    public function index()
    {
        return view('homein.index');
    }
}
