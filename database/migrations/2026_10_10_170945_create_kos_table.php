<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();                                   // Id Kos
            $table->foreignId('id_pemilik')                 // Id Pemilik
                  ->constrained('users')
                  ->cascadeOnDelete();
            $table->string('nama_kos');                     // Nama Kosan
            $table->string('daerah_kos');                   // Daerah Kosan
            $table->integer('harga');                       // Harga (per bulan)
            $table->text('fasilitas')->nullable();          // Fasilitas kos
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};