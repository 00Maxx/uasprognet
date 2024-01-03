<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agama extends Model
{
    use HasFactory;
    protected $table = 'agamas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'agama'
    ];
}
