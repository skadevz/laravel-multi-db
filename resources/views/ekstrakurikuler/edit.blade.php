@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Ubah Ekstrakurikuler
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('ekstrakurikuler_update') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group @if($errors->first('nama')) has-error @endif">
          <label>Nama</label>
          <input class="form-control" type="text" name="nama" value="{{ $data->nama }}">
          <p class="help-block">{{ $errors->first('nama') }}</p>
        </div>
        <div class="form-group @if($errors->first('pembina')) has-error @endif">
          <label>Pembina</label>
          <input class="form-control" type="text" name="pembina" value="{{ $data->pembina }}">
          <p class="help-block">{{ $errors->first('pembina') }}</p>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
