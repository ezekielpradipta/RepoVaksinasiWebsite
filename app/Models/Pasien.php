<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiens';

    protected $fillable = ['nomordaftar', 'nik', 'nama', 'tempatlahir', 'tgllahir', 'alamat', 'pekerjaan','nohp', 'vaksin_id', 'validasi'];

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
