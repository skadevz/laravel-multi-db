@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Tambah Siswa
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('siswa_store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('nis')) has-error @endif">
              <label>NIS</label>
              <input class="form-control" type="text" name="nis">
              <p class="help-block">{{ $errors->first('nis') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('nama')) has-error @endif">
              <label>Nama</label>
              <input class="form-control" type="text" name="nama">
              <p class="help-block">{{ $errors->first('nama') }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('kelas')) has-error @endif">
              <label>Kelas</label>
              <input class="form-control" type="text" name="kelas">
              <p class="help-block">{{ $errors->first('kelas') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('ekstrakurikuler_id')) has-error @endif">
              <div class="form-group">
                <label>Ekstrakurikuler</label>
                <select class="form-control" name="ekstrakurikuler_id">
                  @foreach ($ekstrakurikulers as $ekstrakurikuler)
                    <option value="{{ $ekstrakurikuler->id }}">{{ $ekstrakurikuler->nama }}</option>
                  @endforeach
                </select>
              </div>
              <p class="help-block">{{ $errors->first('ekstrakurikuler_id') }}</p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
@endsection
