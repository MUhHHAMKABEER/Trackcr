<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Device name for admin/user
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('imei')->unique();
            $table->string('model')->nullable();

            // Live-updated GPS data fields
            $table->string('event_status')->nullable();
            $table->float('battery_voltage')->nullable();
            $table->string('utc_time')->nullable();
            $table->string('gps_status')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('date')->nullable();

            $table->timestamp('received_at')->nullable(); // When last packet was received
            $table->timestamps(); // created_at, updated_at



        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trackers');
    }
};
