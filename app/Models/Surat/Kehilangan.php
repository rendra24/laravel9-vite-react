<?php

namespace App\Models\Surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehilangan extends Model
{
    use HasFactory;
    protected $table = 'surat_kehilangan';
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'desa_id','nomor_surat','keluarga_anggota_id','nik','keterangan'
    ];
}