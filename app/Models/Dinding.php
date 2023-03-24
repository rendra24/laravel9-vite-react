<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinding extends Model
{
    use HasFactory;
    protected $table = 'dinding';
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
    ];
}