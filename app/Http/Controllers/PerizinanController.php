<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PerizinanController extends Controller
{
    public function index()
    {
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::get();
        return view('perizinan.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        Perizinan::create($request->all());
        DB::commit();
        return redirect('/perizinan')->with('success', ' Perizinan Berhasil Disimpan ');
    }
}
