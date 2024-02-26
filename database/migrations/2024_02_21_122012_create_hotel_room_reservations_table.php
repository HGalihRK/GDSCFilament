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
        Schema::create('hotel_room_reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_room_id');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('hotel_employee_id');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->text('note')->nullable();
            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms');
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->foreign('hotel_employee_id')->references('id')->on('hotel_employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_room_reservations');
    }
};
