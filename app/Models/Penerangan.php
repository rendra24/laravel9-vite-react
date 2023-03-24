<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerangan extends Model
{
    use HasFactory;
    protected $table = 'penerangan';
    /**
    * fillable
    *
    * @var array
    */
   protected $fillable = [
       'nama',
   ];
}
