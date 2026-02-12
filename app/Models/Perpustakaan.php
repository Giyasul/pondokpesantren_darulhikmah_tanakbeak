<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perpustakaan extends Model
{
    protected $table = 'perpustakaan';

    protected $fillable = [
        'judul',
        'file_pdf',
        'penulis',
        'foto',
    ];
}
