@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Siswa
          </div>
          <div class="col-lg-6 text-right">
            <a href="{{ route('siswa_create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Siswa"><i class="fa fa-plus fa-fw"></i></a>
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive table-bordered">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Ekstrakurikuler</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @forelse ($data as $value)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $value->nis }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->kelas }}</td>
                <td>{{ $value->ekstrakurikuler->nama }}</td>
                <td>
                  <a href="{{ route('siswa_edit', ['id' => $value->id]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Ubah Siswa"><i class="fa fa-pencil fa-fw"></i></a>
                  <a href="{{ route('siswa_delete', ['id' => $value->id]) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Siswa"><i class="fa fa-trash fa-fw"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
