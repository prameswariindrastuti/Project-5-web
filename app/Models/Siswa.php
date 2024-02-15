<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */

     protected $table = "siswa";
     protected $fillable = [
        'nama',
        'kelas',
     ];

     public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_siswa');
    }
}
