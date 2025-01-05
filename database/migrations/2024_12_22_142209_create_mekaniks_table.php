<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mekaniks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mekanik', 15);
            $table->string('nama_mekanik', 30);
            $table->string('bidang_mekanik', 30);
            $table->string('no_hp', 30);
            $table->string('jenis_masalah_kendaraan', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mekaniks');
    }
};
