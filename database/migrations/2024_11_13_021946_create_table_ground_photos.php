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
        Schema::create('ground_photos', function(Blueprint $table){
            $table->string('id')->primary();
            $table->string('ground_detail_id');
            $table->string('name');
            $table->string('size');
            $table->timestamps();

            $table->foreign('ground_detail_id')->references('id')->on('ground_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ground_photos');
    }
};
