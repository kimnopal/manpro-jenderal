<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreProyekRequest;

class ProyekController extends Controller
{
    public function index_proyek(Request $req) {
        $search = request('search_proyek');
        $sort = $req->input('sort', 'created_at'); // Default sorting by 'nama'
        $direction = $req->input('direction', 'desc'); // Default direction 'asc'

        // $data_proyek = Proyek::orderBy($sort, $direction)->paginate(10);

        $data_proyek = Proyek::with('client')
                            // ->latest()
                            ->when($search, function ($query) {
                                return $query->FilterNama(); // Panggil scope FilterNama
                            })
                            ->orderBy($sort, $direction)
                            ->paginate(8);

        $title = 'Hapus proyek ini!';
        $text = "Apakah anda yakin akan menghapus proyek ini?";
        confirmDelete($title, $text);

        return view('proyek.index', [
            'judul_index_proyek' => 'Daftar Proyek',
            'data_proyek' => $data_proyek
        ]);
    }
    public function tambah_proyek() {
        $data_klien = Client::all();
        return view('proyek.create', [
            'judul_tambah_proyek' => 'Tambah Proyek',
            'data_klien'=>$data_klien
        ]);
    }
    public function simpan_proyek(StoreProyekRequest $req) : RedirectResponse{
        Proyek::create($req->validated());
        // return Redirect::route('proyek.index');
        Alert::success('Berhasil', 'Data proyek berhasil ditambahkan');
        return Redirect::route('proyek.index')->with('success', 'Proyek berhasil disimpan.');

        // try {
        //     Proyek::create($req->validated());
        //     return Redirect::route('proyek.index');
        // } catch (\Exception $e) {
        //     return back()->with('error', 'Terjadi kesalahan saat menyimpan proyek.')->withInput();
        // }

        // $proyek = new Proyek;

        // $proyek->no_proyek = $req->no_proyek;
        // $proyek->tgl_mulai_kontrak = $req->tgl_mulai_kontrak;
        // $proyek->tgl_selesai_kontrak = $req->tgl_selesai_kontrak;
        // $proyek->klien_id = $req->klien_id;
        // $proyek->termin = $req->termin;
        // $proyek->biaya = $req->biaya;
        // $proyek->pajak = $req->pajak;
        // $proyek->biaya_lain = $req->biaya_lain;

        // $proyek->save();

        // return Redirect::route('proyek.index');
    }
    public function ubah_proyek($id) {
        $proyek = Proyek::where('id', $id)->first();
        $data_klien = Client::all();
        return view('proyek.ubah', [
            'judul_ubah_proyek'=>'Ubah detail proyek',
            'proyek'=>$proyek,
            'data_klien'=>$data_klien
        ]);
    }
    public function update_proyek(StoreProyekRequest $req, $id) {
        $proyek = Proyek::findOrFail($id);
        $proyek->update($req->validated());

        Alert::success('Berhasil', 'Data proyek diubah');
        return Redirect::route('proyek.index');

        // $proyek = Proyek::where('id', $id)->first();

        // $proyek->no_proyek = $req->no_proyek;
        // $proyek->tgl_mulai_kontrak = $req->tgl_mulai_kontrak;
        // $proyek->tgl_selesai_kontrak = $req->tgl_selesai_kontrak;
        // $proyek->klien_id = $req->klien_id;
        // $proyek->termin = $req->termin;
        // $proyek->biaya = $req->biaya;
        // $proyek->pajak = $req->pajak;
        // $proyek->biaya_lain = $req->biaya_lain;

        // $proyek->save();

        // return Redirect::route('proyek.index');
    }
    public function hapus_proyek($id) {
        $proyek = Proyek::where('id', $id)->first();
        $proyek->delete();
        Alert::success('Berhasil!', 'Data proyek berhasil dihapus.');
        return Redirect::route('proyek.index');
    }
}
