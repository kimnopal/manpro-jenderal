<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Item;
use App\Models\Rekening;
use App\Models\Satuan;
use App\Models\pembelian;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MasterController extends Controller
{

    public function index_client() {
        $data_client = Client::all();

        return \view('client.index', [
            'judul_index_client' => 'List Data Client',
            'data_client' => $data_client,
        ]);
    }
    
    public function create_client() {
        
        return \view('client.create', [
            'judul_create_client' => 'Tambah Data Client'
        ]);
    }

    public function save_client(Request $request) : RedirectResponse {
        $client = new Client();
        $client->nama_client = $request->nama_client;
        $client->alamat_client = $request->alamat_client;
        $client->kontak_client = $request->kontak_client;
        $client->save();

        return Redirect::route('client.index');
    }

    public function edit_client($id) {
        $client = Client::find($id);

        return \view('client.edit', [
            'judul_edit_client' => 'Edit Data Client',
            'client' => $client,
        ]);
    }

    public function update_client(Request $request, $id) : RedirectResponse {
        $client = client::find($id);
        $client->nama_client = $request->nama_client;
        $client->alamat_client = $request->alamat_client;
        $client->kontak_client = $request->kontak_client;
        $client->save();

        return Redirect::route('client.index');
    }

    public function delete_client($id) : RedirectResponse {
        $client = Client::find($id);
        $client->delete();

        return Redirect::route('client.index');
    }

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
    // Controller Bank
    public function index_bank() {
        $data_bank = Bank::all();

        return \view('bank.index', [
            'judul_index_bank' => 'List Data Bank',
            'data_bank' => $data_bank,
        ]);
    }
    
    public function create_bank() {
        
        return \view('bank.create', [
            'judul_create_bank' => 'Tambah Data Bank'
        ]);
    }

    public function save_bank(Request $request) : RedirectResponse {
        $bank = new Bank();
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index');
    }

    public function edit_bank($id) {
        $bank = Bank::find($id);

        return \view('bank.edit', [
            'judul_edit_bank' => 'Edit Data Bank',
            'bank' => $bank,
        ]);
    }

    public function update_bank(Request $request, $id) : RedirectResponse {
        $bank = Bank::find($id);
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index');
    }

    public function delete_bank($id) : RedirectResponse {
        $bank = Bank::find($id);
        $bank->delete();

        return Redirect::route('bank.index');
    }

    // Controller Supplier
    public function index_supplier() {
        $data_supplier = Supplier::all();

        return \view('supplier.index', [
            'judul_index_supplier' => 'List Data Supplier',
            'data_supplier' => $data_supplier,
        ]);
    }
    
    public function create_supplier() {
        
        return \view('supplier.create', [
            'judul_create_supplier' => 'Tambah Data Supplier'
        ]);
    }

    public function save_supplier(Request $request) : RedirectResponse {
        $supplier = new supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->kontak_supplier = $request->kontak_supplier;
        $supplier->save();

        return Redirect::route('supplier.index');
    }

    public function edit_supplier($id) {
        $supplier = Supplier::find($id);

        return \view('supplier.edit', [
            'judul_edit_supplier' => 'Edit Data Supplier',
            'supplier' => $supplier,
        ]);
    }

    public function update_supplier(Request $request, $id) : RedirectResponse {
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->kontak_supplier = $request->kontak_supplier;
        $supplier->save();

        return Redirect::route('supplier.index');
    }

    public function delete_supplier($id) : RedirectResponse {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return Redirect::route('supplier.index');
    }

    // Controller Rekening
    public function index_rekening() {
        $data_rekening = Rekening::all();

        return \view('rekening.index', [
            'judul_index_rekening' => 'List Data Rekening',
            'data_rekening' => $data_rekening,
        ]);
    }

    public function create_rekening() {
        $data_supplier = Supplier::all();
        $data_bank = Bank::all();

        return \view('rekening.create', [
            'judul_create_rekening' => 'Tambah Data Rekening',
            'data_supplier' => $data_supplier,
            'data_bank' => $data_bank,
        ]);
    }

    public function save_rekening(Request $request) : RedirectResponse {
        $rekening = new Rekening();
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();

        return Redirect::route('rekening.index');
    }

    public function edit_rekening($id) {
        $data_supplier = Supplier::all();
        $data_bank = Bank::all();
        $rekening = Rekening::find($id);

        return \view('rekening.edit', [
            'judul_edit_rekening' => 'Edit Data Rekening',
            'data_supplier' => $data_supplier,
            'data_bank' => $data_bank,
            'rekening' => $rekening,
        ]);
    }

    public function update_rekening(Request $request, $id) : RedirectResponse {
        $rekening = Rekening::find($id);
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();
        
        return Redirect::route('rekening.index');
    }

    public function delete_rekening($id) : RedirectResponse {
        $rekening = Rekening::find($id);
        $rekening->delete();

        return Redirect::route('rekening.index');
    }
}


