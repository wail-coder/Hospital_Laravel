<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationWithPusher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_with_pusher', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('notifiable_type');
            $table->foreignId('notifiable_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('code');
            $table->foreignId('room_id')->references('id')->on('rooms')->cascadeOnDelete();
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
        Schema::dropIfExists('notification_with_pusher');
    }
}
