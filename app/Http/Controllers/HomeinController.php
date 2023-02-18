<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Perizinan;
use App\Models\User;
use App\Models\Ustad;
use Illuminate\Http\Request;

class HomeinController extends Controller
{
    public function index()
    {

        $ustadcount = Ustad::count();
        $santricount = Santri::count();
        $perizinancount = Perizinan::count();
        $pelanggarancount = Perizinan::where('keterangan', '=', 'Tidak Tepat Waktu')->count();
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::all();
        return view('homein.index', ['perizinan' => $perizinan, 'santri' => $santri, 'user' => $user, 'santricount' => $santricount, 'perizinancount' => $perizinancount, 'pelanggarancount' => $pelanggarancount, 'ustadcount' => $ustadcount,]);
    }
}
