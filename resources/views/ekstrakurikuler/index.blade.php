@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Ekstrakurikuler
          </div>
          <div class="col-lg-6 text-right">
            <a href="{{ route('ekstrakurikuler_create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Ekstrakurikuler"><i class="fa fa-plus fa-fw"></i></a>
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
              <th>Nama</th>
              <th>Pembina</th>
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
                <td>{{ $value->nama }}</td>
                <td>{{ $value->pembina }}</td>
                <td>
                  <a href="{{ route('ekstrakurikuler_edit', ['id' => $value->id]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Ubah Ekstrakurikuler"><i class="fa fa-pencil fa-fw"></i></a>
                  <a href="{{ route('ekstrakurikuler_delete', ['id' => $value->id]) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Ekstrakurikuler"><i class="fa fa-trash fa-fw"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center">Tidak Ada Data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
