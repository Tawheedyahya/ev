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
        Schema::table('venues', function (Blueprint $table) {
            $table->enum('food_provide',['yes','no'])->default('no');
            $table->decimal('breakfast',6,2)->nullable();
            $table->decimal('lunch',6,2)->nullable();
            $table->decimal('dinner',6,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('venues', function (Blueprint $table) {
            //
        });
    }
};
