<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Item;
use App\Models\Rekening;
use App\Models\Satuan;
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
}


