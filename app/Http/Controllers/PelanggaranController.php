<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\User;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggarancount = Perizinan::where('keterangan', '=', 'Tidak Tepat Waktu')->count();
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::get();
        return view('pelanggaran.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'pelanggarancount' => $pelanggarancount,]);
    }
}
