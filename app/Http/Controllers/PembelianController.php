<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\Proyek;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian_main() {
        $data_pembelian = pembelian::with(['satuan', 'proyek', 'supplier'])->filternama()->paginate(10);

        return \view('pembelian.pembelian-index',[
        'judul_pembelian_index' => 'List Data Pembelian',
        'data_pembelian' => $data_pembelian,
        ]);
    }

    public function pembelian_create(){
        $data_satuan = Satuan::all();
        $data_supplier = Supplier::all();
        $data_proyek = Proyek::all();
        return \view('pembelian.create-pembelian',[
            'judul_create_pembelian' => 'Tambah Pembelian',
            'data_satuan' => $data_satuan,
            'data_supplier' => $data_supplier,
            'data_proyek' => $data_proyek,
        ]);
    }

    public function pembelian_save(Request $request): RedirectResponse{
    $proyekid = $request['proyekid'];
    $qty = $request['qty'];
    $satuanid = $request['satuanid'];
    $hargabeli = $request['hargabeli'];
    $supplierid = $request['supplierid'];
    $pembelian = new pembelian();
    $pembelian -> proyekid = $proyekid;
    $pembelian -> qty = $qty;
    $pembelian -> satuanid = $satuanid;
    $pembelian -> hargabeli = $hargabeli;
    $pembelian -> supplierid = $supplierid;
    $pembelian->save();
    return redirect::route('pembelian.pembelian-index');
    }

    public function pembelian_edit($id){
        $pembelian = pembelian::find($id);
        $data_satuan = Satuan::all();
        $data_proyek = Proyek::all();
        $data_supplier = Supplier::all();
        return \view('pembelian.edit-pembelian',[
            'judul_edit_pembelian' => 'Edit Pembelian',
            'pembelian' => $pembelian,
            'data_satuan' => $data_satuan,
            'data_proyek' => $data_proyek,
            'data_supplier' => $data_supplier,
        ]);
    }

    public function pembelian_delete($id) : RedirectResponse{
        $pembelian = pembelian::find($id);
        $pembelian->delete();
        return redirect::route('pembelian.pembelian-index');
    }
    
    public function pembelian_update(Request $request, $id) : RedirectResponse{
        $pembelian = pembelian::find($id);
        $pembelian->qty = $request -> qty;
        $pembelian->satuanid = $request -> satuanid;
        $pembelian -> save();
        return redirect::route('pembelian.pembelian-index');
    }
}
