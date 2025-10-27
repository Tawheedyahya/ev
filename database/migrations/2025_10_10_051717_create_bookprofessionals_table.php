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
        Schema::create('bookprofessionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('professionals')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('phone');
            $table->enum('status',['pending','cancelled','rejected','approved'])->default('pending');
            $table->text('notes')->nullable();
            $table->dateTime('order_date');
            $table->dateTime('upto_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookprofessionals');
    }
};
