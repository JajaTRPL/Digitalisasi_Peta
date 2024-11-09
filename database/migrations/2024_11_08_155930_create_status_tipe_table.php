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
        Schema::create('statusKepemilikan', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_status_kepemilikan');
            $table->timestamps();
        });

        Schema::create('statusTanah', function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('nama_status_tanah');
            $table->timestamps();
        });

        Schema::create('tipeTanah', function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('nama_tipe_tanah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_kepemilikan');
        Schema::dropIfExists('status_tanah');
        Schema::dropIfExists('tipe_tanah');
    }
};
