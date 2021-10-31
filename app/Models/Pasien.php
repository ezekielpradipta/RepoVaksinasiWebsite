<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';

    const PASIEN_STATUS_CONFIRMED = 1;
    const PASIEN_STATUS_NOT_CONFIRMED = 0;

    protected $fillable = ['nik', 'nama', 'tempatlahir', 'tgllahir', 'alamat', 'pekerjaan','nohp', 'vaksin_id', 'confirmed'];

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class);
    }

    public function scopeConfirmed($query)
    {
        return $query->where('confirmed', $this::PASIEN_STATUS_CONFIRMED);
    }

    public function getStatusInLabelAttribute()
    {
        switch($this->status)
        {
            case $this::PASIEN_STATUS_CONFIRMED:
                $message = "Sudah di Vaksin";
                $label = 'info';
                break;
            case $this::PASIEN_STATUS_NOT_CONFIRMED:
                $message = "Belum di Vaksin";
                $label = 'danger';
                break;
            default:
                $message = "Belum di Vaksin";
                $label = 'danger';
                break;
        }

        return "<span class='badge badge-$label'>$message</span>";
    }
}
