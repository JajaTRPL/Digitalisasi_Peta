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
        Schema::create('grounds', function (Blueprint $table) {
            $table->id();
            $table->json('coordinates');
            $table->timestamps();
        });

        Schema::create('markers', function (Blueprint $table) {
            $table->id();
            $table->decimal('latitude',8,6);
            $table->decimal('longitude', 9,6);
            $table->timestamps();
        });

        Schema::create('informations', function (Blueprint $table){
            $table->id();
            $table->string('nama_asset');
            $table->string('status_kepemilikan');
            $table->string('status_tanah');
            $table->string('alamat');
            $table->string('tipe_tanah');
            $table->integer('luas_asset');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grounds');
    }
};
