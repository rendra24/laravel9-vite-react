<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaPendidikan extends Model
{
    use HasFactory;
    protected $table = 'lembaga_pendidikan';
    /**
    * fillable
    *
    * @var array
    */
   protected $fillable = [
       'nama',
   ];
}
