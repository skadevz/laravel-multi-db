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
      $user = new User;
      $user->name = 'Root';
      $user->username = 'root';
      $user->password = bcrypt('toor');
      $user->save();
      $user->attachRole(1);
    }
}
