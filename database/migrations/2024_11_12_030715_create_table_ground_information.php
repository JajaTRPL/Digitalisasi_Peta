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
        Schema::create('ground_details', function (Blueprint $table){
            $table->string('id')->primary();
            $table->string('nama_asset');
            $table->string('alamat');
            $table->integer('luas_asset');
            $table->string('status_kepemilikan_id');
            $table->string('status_tanah_id');
            $table->string('tipe_tanah_id');
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by');

            $table->timestamps();


            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_tanah_id')->references('id')->on('status_tanah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipe_tanah_id')->references('id')->on('tipe_tanah')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

        });

        // $table->enum('status', array_column(Status::cases(), 'value'))->default(Status::ACTIVE->value);


        Schema::create('ground_markers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ground_detail_id');
            $table->decimal('latitude',8,6);
            $table->decimal('longitude', 9,6);
            $table->timestamps();

            $table->foreign('ground_detail_id')->references('id')->on('ground_details')->onDelete('cascade');
        });

        Schema::create('grounds', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('marker_id');
            $table->json('coordinates');
            $table->timestamps();

            $table->foreign('marker_id')->references('id')->on('ground_markers')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grounds');
        Schema::dropIfExists('ground_markers');
        Schema::dropIfExists('ground_details');
    }
};
