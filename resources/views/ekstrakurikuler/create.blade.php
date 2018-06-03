@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Tambah Ekstrakurikuler
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('ekstrakurikuler_store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group @if($errors->first('nama')) has-error @endif">
          <label>Nama</label>
          <input class="form-control" type="text" name="nama">
          <p class="help-block">{{ $errors->first('nama') }}</p>
        </div>
        <div class="form-group @if($errors->first('pembina')) has-error @endif">
          <label>Pembina</label>
          <input class="form-control" type="text" name="pembina">
          <p class="help-block">{{ $errors->first('pembina') }}</p>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
@endsection
