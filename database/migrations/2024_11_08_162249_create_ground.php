<?php

use App\StatusKepemilikan;
use App\StatusTanah;
use App\TipeTanah;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('groundDetails', function (Blueprint $table){
            $table->string('id')->primary();
            $table->string('nama_asset');
            $table->string('alamat');
            $table->integer('luas_asset');
            $table->binary('sertifikat');
            $table->binary('foto_ground');
            $table->string('status_kepemilikan_id');
            $table->string('status_tanah_id');
            $table->string('tipe_tanah_id');
            $table->timestamps();
            $table->foreign('status_kepemilikan_id')->references('id')->on('statusKepemilikan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_tanah_id')->references('id')->on('statusTanah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipe_tanah_id')->references('id')->on('tipeTanah')->onDelete('cascade')->onUpdate('cascade');
        });

        // $table->enum('status', array_column(Status::cases(), 'value'))->default(Status::ACTIVE->value);


        Schema::create('groundMarkers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ground_detail_id');
            $table->decimal('latitude',8,6);
            $table->decimal('longitude', 9,6);
            $table->timestamps();

            $table->foreign('ground_detail_id')->references('id')->on('groundDetails')->onDelete('cascade');
        });

        Schema::create('grounds', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('marker_id');
            $table->json('coordinates');
            $table->timestamps();

            $table->foreign('marker_id')->references('id')->on('groundMarkers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grounds');
        Schema::dropIfExists('groundMarkers');
        Schema::dropIfExists('groundDetails');
    }
};
