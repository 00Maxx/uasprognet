<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenistransaksi extends Model
{
    protected $table = 'jenistansaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'jenistransaksi',
        'operator'
    ];
    use HasFactory;
}
