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
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_provider_id')->constrained('venueproviders')->cascadeOnDelete();
            $table->string('venue_name');
            $table->string('venue_address');
            $table->string('venue_city');
            $table->integer('venue_seat_capacity');
            $table->decimal('latitude',10,6);
            $table->decimal('longitude',10,6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
