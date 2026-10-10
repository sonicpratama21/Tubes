<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';

    protected $fillable = [
        'kos_id',
        'nama_kamar',
        'fasilitas',
        'ukuran_kamar',
        'harga',
        'slot_tersedia',
    ];

    // Kamar milik satu kos
    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}