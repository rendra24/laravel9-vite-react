<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atap extends Model
{
    use HasFactory;
    protected $table = 'atap';
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
    ];
}