<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah extends Model
{
    protected $table = 'nasabahs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'telepon',
        'lahir',
        'gender',
        'agama_id',
    ];
    use HasFactory;
}
