@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Tambah Admin
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('admin_store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('name')) has-error @endif">
              <label>Nama</label>
              <input class="form-control" type="text" name="name">
              <p class="help-block">{{ $errors->first('name') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('sekolah_id')) has-error @endif">
              <div class="form-group">
                <label>Sekolah</label>
                <select class="form-control" name="sekolah_id">
                  @foreach ($sekolahs as $sekolah)
                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama }}</option>
                  @endforeach
                </select>
              </div>
              <p class="help-block">{{ $errors->first('sekolah_id') }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('username')) has-error @endif">
              <label>Username</label>
              <input class="form-control" type="text" name="username">
              <p class="help-block">{{ $errors->first('username') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('password')) has-error @endif">
              <label>Password</label>
              <input class="form-control" type="password" name="password">
              <p class="help-block">{{ $errors->first('password') }}</p>
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
