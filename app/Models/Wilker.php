<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilker extends Model
{
    use HasFactory;

    protected $table = 'wilayah_kerja'; // Tabel yang digunakan
    protected $fillable = ['wilker'];
}
