<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{

    // Controller Client
    public function index_client() {
        $data_client = Client::filternama()->paginate(5);

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
        $validated = $request->validate([
            'nama_client' => 'required',
            'alamat_client' => 'required',
            'kontak_client' => 'required',
        ]);
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
        $validated = $request->validate([
            'nama_client' => 'required',
            'alamat_client' => 'required',
            'kontak_client' => 'required',
        ]);
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

}


