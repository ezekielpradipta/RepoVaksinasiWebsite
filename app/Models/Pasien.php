<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiens';

    protected $fillable = ['nik', 'nama', 'tempatlahir', 'tgllahir', 'alamat', 'pekerjaan','nohp', 'vaksin_id', 'validasi'];

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }
}
