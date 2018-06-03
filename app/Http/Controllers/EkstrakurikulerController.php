<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
      $ekstrakurikuler = Ekstrakurikuler::get();
      return view('ekstrakurikuler.index', ['data' => $ekstrakurikuler]);
    }

    public function create()
    {
      return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
      $ekstrakurikuler = new Ekstrakurikuler;
      $ekstrakurikuler->nama = $request->nama;
      $ekstrakurikuler->pembina = $request->pembina;
      $ekstrakurikuler->save();
      alert()->success('Ekstrakurikuler Berhasil Ditambah', 'Ekstrakurikuler')->persistent('Tutup');
      return redirect()->route('ekstrakurikuler_index');
    }

    public function edit($id)
    {
      $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
      return view('ekstrakurikuler.edit', ['data' => $ekstrakurikuler]);
    }

    public function update(Request $request)
    {
      $id = $request->id;
      $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
      $ekstrakurikuler->nama = $request->nama;
      $ekstrakurikuler->pembina = $request->pembina;
      $ekstrakurikuler->save();
      alert()->success('Ekstrakurikuler Berhasil Diubah', 'Ekstrakurikuler')->persistent('Tutup');
      return redirect()->route('ekstrakurikuler_index');
    }

    public function delete($id)
    {
      $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
      $ekstrakurikuler->delete();
      alert()->success('Ekstrakurikuler Berhasil Dihapus', 'Ekstrakurikuler')->persistent('Tutup');
      return redirect()->route('ekstrakurikuler_index');
    }
}
