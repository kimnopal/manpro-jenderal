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
            'satuan_id' => 'required|exists:satuan,id',
        ]);
        $item = new Item();
        $item->nama_item = $request->nama_item;
        $item->save();
        $item->satuan()->attach($request->satuan_id);

        return Redirect::route('item.index');
    }

    public function edit_item($id) {
        $data_satuan = Satuan::all();
        $item = Item::with(['satuan'])->find($id);

        return \view('item.edit', [
            'judul_edit_item' => 'Detail Data Item',
            'item' => $item,
            'data_satuan' => $data_satuan,
        ]);
    }

    public function update_item(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'nama_item' => 'required',
        ]);
        $item = Item::find($id);
        $item->nama_item = $request->nama_item;
        $item->save();
        
        return Redirect::route('item.index');
    }

    public function itemsatuan_edit(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'tambah_satuan_item' => 'required|exists:satuan,id',
        ]);
        $item = Item::find($id);
        $item->satuan()->attach($request->tambah_satuan_item);

        return Redirect::route('item.edit', [
            'id' => $id,
        ]);
    }

    public function itemsatuan_delete($itemid, $id) : RedirectResponse {
        $item = Item::find($itemid);
        $item->satuan()->detach($id);

        return Redirect::route('item.edit', [
            'id' => $itemid,
        ]);
    }

    public function delete_item($id) : RedirectResponse {
        $item = Item::find($id);
        $item->satuan()->detach();
        $item->delete();

        return Redirect::route('item.index');
    }
}
