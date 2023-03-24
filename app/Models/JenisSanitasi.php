<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSanitasi extends Model
{
    use HasFactory;
    protected $table = 'jenis_sanitasi';
    /**
    * fillable
    *
    * @var array
    */
   protected $fillable = [
       'nama',
   ];
}
