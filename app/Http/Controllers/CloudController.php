<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;

class CloudController extends Controller
{
    public function index()
    {
      $sekolah = Sekolah::get();
      return view('cloud.index', ['data' => $sekolah]);
    }

    public function create()
    {
      return view('cloud.create');
    }

    public function store(Request $request)
    {
      $sekolah = new Sekolah;
      $sas_db = str_slug(config('app.name'), '') . '_' . str_slug($request->nama, '') . '_sas';
      $sekolah->nama = $request->nama;
      $sekolah->sas_db = $sas_db;
      $sekolah->save();
      if (!check_database($sas_db)) {
        create_database($sas_db);
        migrate_tables($sas_db);
      }
      alert()->success('Cloud Sekolah Berhasil Ditambah', 'Cloud')->persistent('Tutup');
      return redirect()->route('cloud_index');
    }

    public function edit($id)
    {
      $sekolah = Sekolah::findOrFail($id);
      return view('cloud.edit', ['data' => $sekolah]);
    }

    public function update(Request $request)
    {
      $id = $request->id;
      $sekolah = Sekolah::findOrFail($id);
      $sas_db = str_slug(config('app.name'), '') . '_' . str_slug($request->nama, '') . '_sas';
      $sekolah->nama = $request->nama;
      // NAMA DATABASE TIDAK DIGANTI
      // $sekolah->sas_db = $sas_db;
      $sekolah->save();
      // if (!check_database($sas_db)) {
      //   create_database($sas_db);
      //   migrate_tables($sas_db);
      // }
      alert()->success('Cloud Sekolah Berhasil Diubah', 'Cloud')->persistent('Tutup');
      return redirect()->route('cloud_index');
    }

    public function delete($id)
    {
      $sekolah = Sekolah::findOrFail($id);
      $sas_db = $sekolah->sas_db;
      $sekolah->delete();
      if (check_database($sas_db)) {
        drop_database($sas_db);
      }
      alert()->success('Cloud Sekolah Berhasil Dihapus', 'Cloud')->persistent('Tutup');
      return redirect()->route('cloud_index');
    }
}
