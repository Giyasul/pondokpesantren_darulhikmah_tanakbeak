<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'foto',
        'nik',
        'nuptk',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'mapel',
        'penempatan',
    ];
}
