@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        <div class="row">
          <div class="col-lg-6">
            Ubah Admin
          </div>
        </div>
      </h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <form action="{{ route('admin_update') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group @if($errors->first('name')) has-error @endif">
              <label>Nama</label>
              <input class="form-control" type="text" name="name" value="{{ $data->name }}">
              <p class="help-block">{{ $errors->first('name') }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('username')) has-error @endif">
              <label>Username</label>
              <input class="form-control" type="text" name="username" value="{{ $data->username }}">
              <p class="help-block">{{ $errors->first('username') }}</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group @if($errors->first('password')) has-error @endif">
              <label>Password</label>
              <input class="form-control" type="password" name="password" placeholder="Isi jika akan diubah">
              <p class="help-block">{{ $errors->first('password') }}</p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
