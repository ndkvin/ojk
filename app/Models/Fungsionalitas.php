<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fungsionalitas extends Model
{
    use HasFactory;
    protected $table = 'fungsionalitas';
    protected $fillable = ['function_id', 'type_id', 'satker_id', 'bidang_id'];
}
