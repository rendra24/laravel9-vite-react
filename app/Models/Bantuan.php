<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $table = 'bantuan';
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
    ];
}