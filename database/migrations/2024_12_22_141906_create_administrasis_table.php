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
        Schema::create('administrasis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembayaran', 15);
            $table->string('pelanggan', 30);
            $table->string('mekanik', 30);
            $table->string('jenis_masalah kendaraan', 30);
            $table->string('harga', 30);
            $table->string('metode_pembayaran', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrasis');
    }
};
