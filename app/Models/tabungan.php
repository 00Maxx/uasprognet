<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabungan extends Model
{
    use HasFactory;
    protected $table = 'tabungans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nasabah_id',
        'jenistransaksi_id',
        'nominal',
        'keterangan',
        'user_id'
    ];
}
