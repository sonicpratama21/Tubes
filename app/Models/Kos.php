<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    protected $table = 'kos';

    protected $fillable = [
        'id_pemilik',
        'nama_kos',
        'daerah_kos',
        'harga',
        'fasilitas',
    ];

    // Satu kos punya banyak kamar
    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'kos_id');
    }

    // Kos dimiliki oleh satu pemilik (user)
    public function pemilik()
    {
        return $this->belongsTo(User::class, 'id_pemilik');
    }
}