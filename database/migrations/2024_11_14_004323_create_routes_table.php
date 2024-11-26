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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('scheduled_start_date');
            $table->dateTime('scheduled_finish_date');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('finish_date')->nullable();
            $table->foreignId('driver_id')->references('id')->on('drivers');
            $table->foreignId('start_city_id')->references('id')->on('cities');
            $table->foreignId('finish_city_id')->references('id')->on('cities');
            $table->foreignId('vehicle_id')->references('id')->on('vehicles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
