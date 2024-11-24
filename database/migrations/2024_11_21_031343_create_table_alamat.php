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
        Schema::create('ground_address', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('detail_alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('padukuhan');
            $table->string('desa')->default('Umbulharjo');
            $table->string('kecamatan')->default('Cangkringan');
            $table->string('kabupaten')->default('Sleman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_alamat');
    }
};
