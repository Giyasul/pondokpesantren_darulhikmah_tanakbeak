<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'santri';

    protected $fillable = [
        'nama',
        'foto',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'kelas',
        'status',
        'jk',
        'alamat',
        'kebutuhan_khusus',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'angkatan',
        'jenjang',
    ];
}
