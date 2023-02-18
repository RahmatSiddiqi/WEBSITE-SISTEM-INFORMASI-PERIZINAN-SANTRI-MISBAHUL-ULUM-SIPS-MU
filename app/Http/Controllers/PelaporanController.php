<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Perizinan;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PelaporanController extends Controller
{
    public function index()
    {
        $user = User::all();
        $santri = Santri::all();
        $perizinan = Perizinan::all();
        $pelaporan = Pelaporan::get();
        return view('pelaporan.index', ['pelaporan' => $pelaporan, 'perizinan' => $perizinan, 'santri' => $santri, 'user' => $user,]);
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $santri = Santri::findOrFail($request->santri_id)->only('status');
        if ($santri['status'] != 'tbpulang') {
            Session::flash('message', 'tidak bisa melakukan pelaporan karena kesalahan data');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/pelaporan');
        } else {

            try {
                DB::beginTransaction();
                Pelaporan::create($request->all());

                $santri = Santri::findOrFail($request->santri_id);
                $santri->status = 'bpulang';
                $santri->save();
                DB::commit();
                Session::flash('message', 'pelaporan berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('/pelaporan');
                // $this->validate($request, [
                //     'perizinan_id' => 'required',
                //     'tgl_balik' => 'required',
                //     'keterangan' => 'required',
                //     'user_id' => 'required',

                // ]);

                // $pelaporan = new Pelaporan;

                // $pelaporan->perizinan_id = $request->input('perizinan_id');
                // $pelaporan->user_id = $request->input('user_id');
                // $pelaporan->tgl_balik = $request->input('tgl_balik');
                // $pelaporan->keterangan = $request->input('keterangan');

                // $pelaporan->save();
                // return redirect('/pelaporan')->with('success', ' Data Berhasil Disimpan ');
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                dd($th);
            }
        }
    }
}
