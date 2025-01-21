<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function pembelian_main() {
        $data_pembelian = pembelian::all();

        return \view('pembelian.pembelian-index',[
        'judul_pembelian_index' => 'List Data Pembelian',
        'data_pembelian' => $data_pembelian,
        ]);
    }

    public function pembelian_create(){
        return \view('pembelian.create-pembelian',[
            'judul_create_pembelian' => 'Tambah Pembelian'
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
        return \view('pembelian.edit-pembelian',[
            'judul_edit_pembelian' => 'Edit Pembelian',
            'pembelian' => $pembelian,
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
