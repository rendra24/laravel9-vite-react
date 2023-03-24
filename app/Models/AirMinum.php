<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirMinum extends Model
{
    use HasFactory;
    protected $table = 'air_minum';
    /**
    * fillable
    *
    * @var array
    */
   protected $fillable = [
       'nama',
   ];
}