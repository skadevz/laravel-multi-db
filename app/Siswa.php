<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $connection = 'sas_db';

    protected $table = 'siswa';

    protected $fillable = [
      'nis', 'nama', 'kelas', 'ekstrakurikuler_id',
    ];

    public function ekstrakurikuler()
    {
      return $this->belongsTo(Ekstrakurikuler::class);
    }
}
