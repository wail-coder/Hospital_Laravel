<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsBuildingsFloorsRooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_buildings_floors_rooms', function (Blueprint $table) {
            $table->foreignId('groups_id')->references('id')->on('groups')->cascadeOnDelete();
            $table->foreignId('buildings_id')->references('id')->on('buildings')->cascadeOnDelete();
            $table->foreignId('floors_id')->references('id')->on('floors')->cascadeOnDelete();
            $table->foreignId('rooms_id')->references('id')->on('rooms')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_buildings_floors_rooms');
    }
}
