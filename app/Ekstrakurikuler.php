<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $connection = 'sas_db';

    protected $table = 'ekstrakurikuler';

    protected $fillable = [
      'nama', 'pembina',
    ];
}
