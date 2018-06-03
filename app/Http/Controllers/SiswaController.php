<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Ekstrakurikuler;

class SiswaController extends Controller
{
    public function index()
    {
      $siswa = Siswa::get();
      return view('siswa.index', ['data' => $siswa]);
    }

    public function create()
    {
      $ekstrakurikuler = Ekstrakurikuler::get();
      return view('siswa.create', ['ekstrakurikulers' => $ekstrakurikuler]);
    }

    public function store(Request $request)
    {
      $siswa = new Siswa;
      $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas = $request->kelas;
      $siswa->ekstrakurikuler_id = $request->ekstrakurikuler_id;
      $siswa->save();
      alert()->success('Siswa Berhasil Ditambahkan', 'Siswa')->persistent('Tutup');
      return redirect()->route('siswa_index');
    }

    public function edit($id)
    {
      $siswa = Siswa::findOrFail($id);
      $ekstrakurikuler = Ekstrakurikuler::get();
      return view('siswa.edit', ['data' => $siswa, 'ekstrakurikulers' => $ekstrakurikuler]);
    }

    public function update(Request $request)
    {
      $id = $request->id;
      $siswa = Siswa::findOrFail($id);
      $siswa->nis = $request->nis;
      $siswa->nama = $request->nama;
      $siswa->kelas = $request->kelas;
      $siswa->ekstrakurikuler_id = $request->ekstrakurikuler_id;
      $siswa->save();
      alert()->success('Siswa Berhasil Diubah', 'Siswa')->persistent('Tutup');
      return redirect()->route('siswa_index');
    }

    public function delete($id)
    {
      $siswa = Siswa::findOrFail($id);
      $siswa->delete();
      alert()->success('Siswa Berhasil Dihapus', 'Siswa')->persistent('Tutup');
      return redirect()->route('siswa_index');
    }
}
