<?php

if (! function_exists('check_database')) {
  function check_database($db_name) {
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";
    $db = DB::select($query, [$db_name]);
    if (empty($db)) {
      return 0;
    } else {
      return 1;
    }
  }
}

if (! function_exists('create_database')) {
  function create_database($db_name) {
    DB::statement("CREATE DATABASE $db_name");
  }
}

if (! function_exists('drop_database')) {
  function drop_database($db_name) {
    DB::statement("DROP DATABASE $db_name");
  }
}

if (! function_exists('migrate_tables')) {
  function migrate_tables($db_name) {
    config(['database.connections.sas_db.database' => $db_name]);
    Artisan::call('migrate',
     [
         '--database' => 'sas_db', // connection
         '--path'     => 'database/sekolah',
         '--step'     => true,
         '--force'    => true
     ]);
  }
}

if (! function_exists('set_database')) {
  function set_database()
  {
    if (Auth::check()) {
      $sekolah = App\Sekolah::find(Auth::user()->sekolah_id);
      if ($sekolah != null) {
        config(['database.connections.sas_db.database' => $sekolah->sas_db]);
        return true;
      }
      return false;
    }
    return false;
  }
}
