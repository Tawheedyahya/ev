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
        Schema::create('proserviceplaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pro_id')->constrained('professionals')->cascadeOnDelete();
            $table->foreignId('ser_id')->constrained('serviceplaces')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proserviceplaces');
    }
};
