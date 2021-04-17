<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsBuildings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals_buildings', function (Blueprint $table) {
            $table->foreignId('hospitals_id')->references('id')->on('hospitals')->cascadeOnDelete();
            $table->foreignId('buildings_id')->references('id')->on('buildings')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals_buildings');
    }
}
