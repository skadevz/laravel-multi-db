<?php

use Illuminate\Database\Seeder;
use App\Sekolah;
use App\User;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sekolah = new Sekolah;
      $sekolah->nama = 'SMKN 10 Jakarta';
      $sekolah->sas_db = strtolower(config('APP_NAME')) . '_smkn10jakarta_sas';
      $sekolah->save();

      $user = new User;
      $user->sekolah_id = $sekolah->id;
      $user->name = 'Root';
      $user->username = 'root';
      $user->password = bcrypt('toor');
      $user->save();
      $user->attachRole(1);

      $user = new User;
      $user->sekolah_id = $sekolah->id;
      $user->name = 'Admin SMKN 10 Jakarta';
      $user->username = 'admin10';
      $user->password = bcrypt('admin10');
      $user->save();
      $user->attachRole(2);
    }
}
