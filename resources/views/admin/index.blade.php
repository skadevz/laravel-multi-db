@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Admin
          </div>
          <div class="col-lg-6 text-right">
            <a href="{{ route('admin_create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Admin"><i class="fa fa-plus fa-fw"></i></a>
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
              <th>Username</th>
              <th>Sekolah</th>
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
                <td>{{ $value->name }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->sekolah->nama }}</td>
                <td></td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">Tidak Ada Data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
