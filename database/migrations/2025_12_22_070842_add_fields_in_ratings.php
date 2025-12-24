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
        Schema::table('ratingalls', function (Blueprint $table) {
            //
            $table->enum('status',['activate','deactivate'])->default('deactivate');
            $table->tinyInteger('status_id')->default(0)->comment('0=deactivate,1=activate');
            $table->index('status_id','index_status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ratingalls', function (Blueprint $table) {
            //
            $table->dropIndex('index_status_id');
           $table->dropColumn(['status','status_id']);
        });
    }
};
