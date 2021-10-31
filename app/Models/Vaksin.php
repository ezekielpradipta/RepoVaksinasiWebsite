<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    protected $table = 'vaksin';

    protected $fillable = ['vaksin_stock', 'vaksin_dosis', 'vaksin_sesi', 'vaksin_status'];

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
