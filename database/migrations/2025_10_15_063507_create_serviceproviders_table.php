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
        Schema::create('serviceproviders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category')->constrained('servicecategories')->cascadeOnDelete();
            $table->string('name');
            $table->string('companyname');
            $table->string('city');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            // $table->string('doc');
            // $table->decimal('experience', 5, 1);
            // $table->string('category');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('token')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceproviders');
    }
};
