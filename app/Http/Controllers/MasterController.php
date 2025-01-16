<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Satuan;
use App\Models\pembelian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MasterController extends Controller
{
    // Controller Satuan
    public function index_satuan() {
        $data_satuan = Satuan::all();

        return \view('satuan.index', [
            'judul_index_satuan' => 'List Data Satuan',
            'data_satuan' => $data_satuan,
        ]);
    }
    
    public function create_satuan() {
        
        return \view('satuan.create', [
            'judul_create_satuan' => 'Tambah Data Satuan'
        ]);
    }

    public function save_satuan(Request $request) : RedirectResponse {
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();

        return Redirect::route('satuan.index');
    }

    public function edit_satuan($id) {
        $satuan = Satuan::find($id);

        return \view('satuan.edit', [
            'judul_edit_satuan' => 'Edit Data Satuan',
            'satuan' => $satuan,
        ]);
    }

    public function update_satuan(Request $request, $id) : RedirectResponse {
        $satuan = Satuan::find($id);
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();

        return Redirect::route('satuan.index');
    }

    public function delete_satuan($id) : RedirectResponse {
        $satuan = Satuan::find($id);
        $satuan->delete();

        return Redirect::route('satuan.index');
    }
    
    // Controller Item
    public function index_item() {
        $data_item = Item::all();

        return \view('item.index', [
            'judul_index_item' => 'List Data Item',
            'data_item' => $data_item,
        ]);
    }

    public function create_item() {
        $data_satuan = Satuan::all();

        return \view('item.create', [
            'judul_create_item' => 'Tambah Data Item',
            'data_satuan' => $data_satuan,
        ]);
    }

    public function save_item(Request $request) : RedirectResponse {
        $item = new Item();
        $item->nama_item = $request->nama_item;
        $item->satuan_id = $request->satuan_id;
        $item->save();

        return Redirect::route('item.index');
    }

    public function edit_item($id) {
        $data_satuan = Satuan::all();
        $item = Item::find($id);

        return \view('item.edit', [
            'judul_edit_item' => 'Edit Data Item',
            'item' => $item,
            'data_satuan' => $data_satuan,
        ]);
    }

    public function update_item(Request $request, $id) : RedirectResponse {
        $item = Item::find($id);
        $item->nama_item = $request->nama_item;
        $item->satuan_id = $request->satuan_id;
        $item->save();

        return Redirect::route('item.index');
    }

    public function delete_item($id) : RedirectResponse {
        $item = Item::find($id);
        $item->delete();

        return Redirect::route('item.index');
    }

    //Pembelian 
    public function pembelian_main(){
        $data_pembelian = pembelian::all();
        return \view('pembelian.pembelian-index',[
        'judul_pembelian_index' => 'List Data Satuan',
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
        $pembelian->DB::delete();
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


