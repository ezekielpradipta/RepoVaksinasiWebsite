<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'websites';
    protected $fillable = [
        'app_name', 'puskesmas_name', 'puskesmas_alamat',
        'puskesmas_email', 'puskesmas_nohp', 'puskesmas_image',
        'puskesmas_image_size','favicon'
    ];
}
