@php
  $active_cloud = false;
  if (str_is(route('cloud_index') . '*', url()->current())) $active_cloud = true;

  $active_admin = false;
  if (str_is(route('admin_index') . '*', url()->current())) $active_admin = true;

  $active_ekstrakurikuler = false;
  if (str_is(route('ekstrakurikuler_index') . '*', url()->current())) $active_ekstrakurikuler = true;

  $active_siswa = false;
  if (str_is(route('siswa_index') . '*', url()->current())) $active_siswa = true;
@endphp

<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      @role('root')
        <li>
          <a @if ($active_cloud) class="active" @endif href="{{ route('cloud_index') }}"><i class="fa fa-cloud fa-fw"></i> Cloud</a>
        </li>
        <li>
          <a @if ($active_admin) class="active" @endif href="{{ route('admin_index') }}"><i class="fa fa-user-secret fa-fw"></i> Admin</a>
        </li>
      @endrole
      @role('admin')
        <li>
          <a @if ($active_ekstrakurikuler) class="active" @endif href="{{ route('ekstrakurikuler_index') }}"><i class="fa fa-dashboard fa-fw"></i> Ekstrakurikuler</a>
        </li>
        <li>
          <a @if ($active_siswa) class="active" @endif href="{{ route('siswa_index') }}"><i class="fa fa-users fa-fw"></i> Siswa</a>
        </li>
      @endrole
    </ul>
  </div>
</div>
