<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelaporanController extends Controller
{
    public function index()
    {
        return view('pelaporan.index');
    }
}
