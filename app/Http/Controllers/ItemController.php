<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index_item() {
        $data_item = Item::with(['satuan'])->filternama()->paginate(10);

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
        $validated = $request->validate([
            'nama_item' => 'required',
            'satuan_id' => 'required',
        ]);
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
        $validated = $request->validate([
            'nama_item' => 'required',
            'satuan_id' => 'required',
        ]);
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
