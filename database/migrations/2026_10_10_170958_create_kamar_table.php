<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamar', function (Blueprint $table) {
            $table->id();                                   // Id Kamar
            $table->foreignId('kos_id')                     // Id Kos (foreign key)
                  ->constrained('kos')
                  ->cascadeOnDelete();
            $table->string('nama_kamar');                   // Nama/tipe kamar, mis. "Kamar A1"
            $table->text('fasilitas')->nullable();          // Fasilitas kamar
            $table->string('ukuran_kamar');                 // Mis. "3x4 m"
            $table->integer('harga');                       // Harga kamar
            $table->integer('slot_tersedia')->default(0);   // Status: tersedia berapa slot
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};