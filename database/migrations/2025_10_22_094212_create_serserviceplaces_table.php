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
        Schema::create('serserviceplaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serpro_id')->constrained('serviceproviders')->cascadeOnDelete();
            $table->foreignId('serpla_id')->constrained('serviceplaces')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serserviceplaces');
    }
};
