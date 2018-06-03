<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sekolah;

class AdminController extends Controller
{
    public function index()
    {
      $admin = User::join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->where('role_user.role_id', 2)
                    ->get();
      return view('admin.index', ['data' => $admin]);
    }

    public function create()
    {
      $sekolah = Sekolah::get();
      return view('admin.create', ['sekolahs' => $sekolah]);
    }

    public function store(Request $request)
    {
      $admin = new User;
      $admin->sekolah_id = $request->sekolah_id;
      $admin->name = $request->name;
      $admin->username = $request->username;
      $admin->password = bcrypt($request->password);
      $admin->save();
      $admin->attachRole(2);
      alert()->success('Admin Berhasil Ditambahkan', 'Admin')->persistent('Tutup');
      return redirect()->route('admin_index');
    }

    public function edit($id)
    {
      $admin = User::findOrFail($id);
      return view('admin.edit', ['data' => $admin]);
    }

    public function update(Request $request)
    {
      $id = $request->id;
      $admin = User::findOrFail($id);
      $admin->name = $request->name;
      $admin->username = $request->username;
      if ($request->password != null) {
        $admin->password = bcrypt($request->password);
      }
      $admin->save();
      alert()->success('Admin Berhasil Diubah', 'Admin')->persistent('Tutup');
      return redirect()->route('admin_index');
    }

    public function delete($id)
    {
      $admin = User::findOrFail($id);
      $admin->delete();
      alert()->success('Admin Berhasil Dihapus', 'Admin')->persistent('Tutup');
      return redirect()->route('admin_index');
    }
}
