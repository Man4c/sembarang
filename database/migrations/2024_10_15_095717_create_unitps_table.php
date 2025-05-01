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
        Schema::create('unitps', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable(); // Ensure this line allows NULL values
            $table->string('nama');
            $table->char('kontroller');
            $table->integer('tarif');
            // $table->string('status');
            $table->char('penyimpanan');
            $table->integer('stok');
            $table->string('rincian');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unitps');
    }
};
