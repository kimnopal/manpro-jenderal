<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProyekController extends Controller
{
    public function index_proyek() {
        $data_proyek = Proyek::filterNama()->paginate(5);
        return view('proyek.index', [
            'judul_index_proyek' => 'Daftar Proyek',
            'data_proyek' => $data_proyek
        ]);
    }
    public function tambah_proyek() {
        return view('proyek.create', [
            'judul_tambah_proyek' => 'Tambah Proyek'
        ]);
    }
    public function simpan_proyek(Request $req) : RedirectResponse{
        $proyek = new Proyek;

        $proyek->no_proyek = $req->no_proyek;
        $proyek->tgl_mulai_kontrak = $req->tgl_mulai_kontrak;
        $proyek->tgl_selesai_kontrak = $req->tgl_selesai_kontrak;
        $proyek->klien_id = $req->klien_id;
        $proyek->termin = $req->termin;
        $proyek->biaya = $req->biaya;
        $proyek->pajak = $req->pajak;
        $proyek->biaya_lain = $req->biaya_lain;

        $proyek->save();

        return Redirect::route('proyek.index');
    }
    public function ubah_proyek($id) {
        $proyek = Proyek::where('id', $id)->first();
        return view('proyek.ubah', [
            'judul_ubah_proyek'=>'Ubah detail proyek',
            'proyek'=>$proyek
        ]);
    }
    public function update_proyek(Request $req, $id) {
        $proyek = Proyek::where('id', $id)->first();

        $proyek->no_proyek = $req->no_proyek;
        $proyek->tgl_mulai_kontrak = $req->tgl_mulai_kontrak;
        $proyek->tgl_selesai_kontrak = $req->tgl_selesai_kontrak;
        $proyek->klien_id = $req->klien_id;
        $proyek->termin = $req->termin;
        $proyek->biaya = $req->biaya;
        $proyek->pajak = $req->pajak;
        $proyek->biaya_lain = $req->biaya_lain;

        $proyek->save();

        return Redirect::route('proyek.index');
    }
    public function hapus_proyek($id) {
        $proyek = Proyek::where('id', $id)->first();
        $proyek->delete();
        return Redirect::route('proyek.index');
    }
}
