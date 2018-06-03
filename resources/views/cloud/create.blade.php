@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Tambah Cloud
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('cloud_store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group @if($errors->first('name')) has-error @endif">
          <label>Nama Sekolah</label>
          <input class="form-control" type="text" name="nama">
          <p class="help-block">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
@endsection
